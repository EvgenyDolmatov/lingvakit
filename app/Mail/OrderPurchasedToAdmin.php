<?php

namespace App\Mail;

use App\Models\LMS\Course;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPurchasedToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $order;

    /**
     * Create a new message instance.
     *
     * @param Course $course
     * @param Order $order
     */
    public function __construct(Course $course, Order $order)
    {
        $this->course = $course;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Заказ №'.$this->order->id.' оплачен';

        return $this->subject($subject)
            ->view('mails.orders.order-purchased-to-admin', [
                'course' => $this->course,
                'order' => $this->order,
            ]);
    }
}
