<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'user_id', 'content', 'date'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTime(): string
    {
        return Carbon::parse($this->date)->format("H:i");
    }

    public function messageViewed(User $user): bool
    {
        $status = ChatMessageStatus::where('message_id', $this->id)->where('user_id', $user->id)->first();
        return (bool)$status;
    }
}
