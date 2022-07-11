<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id', 'order_id', 'type', 'amount', 'date', 'status', 'first6', 'last4',
        'expiry_month', 'expiry_year', 'card_type', 'issuer_country', 'paid'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
