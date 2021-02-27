<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function add($user)
    {
        $setting = new static();
        $setting->user_id = $user->id;
        $setting->save();

        return $setting;
    }
}
