<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackMessage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'message'];

    public static function add($fields)
    {
        $user = \Auth::user();

        $message = new static();
        if ($user) {
            $message->user_id = $user->id;
        }
        $message->fill($fields);
        $message->save();

        return $message;
    }
}
