<?php

namespace App\Http\Controllers;

use App\Mail\OrderPurchased;
use App\Models\LMS\Course;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use YooKassa\Client;

class OrderController extends Controller
{
    public function checkout(Course $course)
    {
        return view('site.orders.checkout', [
            'user' => Auth::user(),
            'course' => $course,
        ]);
    }

    public function storeOrder(Request $request, Course $course)
    {
        $client = new Client();
        $client->setAuth('785971', 'test_e31vp0OKw6pXDmAvCk7jvloxc6lWiHS8ZwBeVyAK9tc');

        $user = Auth::user();
        $order = false;
        $userOrders = Order::where('user_id', $user->id)->get();

        foreach ($userOrders as $userOrder) {
            foreach ($userOrder->details as $detail) {
                if ($detail->course_id === $course->id) {
                    $order = $userOrder;
                }
            }
        }

        if (!$order) {
            $order = Order::add($request->all(), $user);
            OrderDetail::add($order, $course);
        }

        $price = 0;
        foreach ($order->details as $detail) {
            $price += $detail->total;
        }
        $user->update($request->all());

        $response = $client->createPayment(
            array(
                'amount' => array(
                    'value' => $price,
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => route('orders.payment-info'),
                ),
                "receipt" => array(
                    "customer" => array(
                        "full_name" => $user->getFullName(),
                        "phone" => $user->formatPhoneNumber(),
                    ),
                    "items" => array(
                        array(
                            "description" => $course->title,
                            "quantity" => "1.00",
                            "amount" => array(
                                "value" => $course->price,
                                "currency" => "RUB"
                            ),
                            "vat_code" => "2",
                            "payment_mode" => "full_prepayment",
                            "payment_subject" => "service"
                        )
                    )
                ),
                'capture' => true,
                'description' => 'Заказ №' . $order->id,
            ),
            uniqid('', true)
        );

        $paymentData = $response->jsonSerialize();
        $paymentUrl = $response->getConfirmation()->getConfirmationUrl();

        Payment::create([
            'payment_id' => $paymentData['id'],
            'order_id' => $order->id,
            'status' => $paymentData['status'],
            'amount' => $paymentData['amount']['value'],
            'date' => date('Y-m-d'),
        ]);

        return redirect($paymentUrl);
    }

    public function paymentResult()
    {
        $client = new Client();
        $client->setAuth('785971', 'test_e31vp0OKw6pXDmAvCk7jvloxc6lWiHS8ZwBeVyAK9tc');

        $user = Auth::user();
        $order = $user->getLastOrder();
        $payment = $order->getCurrentPayment();
        $paymentData = $client->getPaymentInfo($payment->payment_id)->jsonSerialize();

        /* Payment Info */
        $paymentStatus = $paymentData['status'];
        $paymentPaid = $paymentData['paid'];
        $paymentAmount = $paymentData['amount']['value'];
        $paymentType = $paymentData['payment_method']['type'];
        $paymentCardFirst6 = getArrayData($paymentData, 'first6');
        $paymentCardLast4 = getArrayData($paymentData, 'last4');
        $paymentCardExpiryMonth = getArrayData($paymentData, 'expiry_month');
        $paymentCardExpiryYear = getArrayData($paymentData, 'expiry_year');
        $paymentCardType = getArrayData($paymentData, 'expiry_year');
        $paymentCardIssuerCountry = getArrayData($paymentData, 'issuer_country');

        $payment->update([
            'status' => $paymentStatus,
            'paid' => $paymentPaid,
            'amount' => $paymentAmount,
            'type' => $paymentType,
            'first6' => $paymentCardFirst6,
            'last4' => $paymentCardLast4,
            'expiry_month' => $paymentCardExpiryMonth,
            'expiry_year' => $paymentCardExpiryYear,
            'card_type' => $paymentCardType,
            'issuer_country' => $paymentCardIssuerCountry,
        ]);

        $course = Course::find($order->details()->first()->course_id);

        if ($payment->paid && !$user->courses->contains($course->id)) {
            $user->courses()->attach($course->id);

            Mail::to($user->email)->send(new OrderPurchased($course, $order));
        }

        return view('site.orders.payment-result', [
            'order' => $order,
            'course' => $course,
        ]);
    }
}
