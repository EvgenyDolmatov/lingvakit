<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description', 'discount', 'type', 'expiration_date'];

    public function setExpirationDateAttribute($value)
    {
        $expDate = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        $this->attributes['expiration_date'] = $expDate;
    }

    public function getExpirationDateAttribute($value) : string
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function setDiscount($discount, $type)
    {
        if ($type === 'percent') {
            if ($discount > 100) {
                $this->discount = 100;
            }
        } else {
            $this->discount = $discount;
        }
        $this->save();
    }

    public function getDiscount() : string
    {
        if ($this->type === 'percent') {
            return $this->discount . '%';
        }
        return $this->discount . ' ₽';
    }
}
