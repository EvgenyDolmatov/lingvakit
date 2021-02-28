<?php

namespace App\Mail;

use App\Models\FeedbackMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;

    /**
     * Create a new message instance.
     *
     * @param FeedbackMessage $feedback
     */
    public function __construct(FeedbackMessage $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Новый вопрос с сайта';

        return $this->subject($subject)
            ->view('mails.feedback', [
                'feedback' => $this->feedback
            ]);
    }
}
