<?php

namespace App\Models;

use App\Models\LMS\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'course_id', 'price', 'quantity', 'discount', 'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function add($order, $course)
    {
        $price = $course->price;
        $discount = 0;

        if ($course->sale_price) {
            $discount = $course->price - $course->sale_price;
        }

        $detail = new static;
        $detail->order_id = $order->id;
        $detail->course_id = $course->id;
        $detail->price = $price;
        $detail->discount = $discount;
        $detail->total = $price - $discount;
        $detail->save();

        return $detail;
    }

    public function getTotal($price) : string
    {
        $total = $price * $this->quantity;
        return number_format($total, 0, '.', ' ') . ' ₽';
    }
}
