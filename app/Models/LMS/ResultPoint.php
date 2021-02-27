<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultPoint extends Model
{
    use HasFactory;
    protected $table = 'lms_result_points';
    protected $fillable = ['result_id', 'question_id', 'points'];

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }

    public function question()
    {
        return $this->belongsTo(Conformity::class, 'question_id');
    }

    public function setPoints($user, $question)
    {
        $total = 0;

        if ($question->type === 'matching') {
            if ($question->checkAnswer($user)) {
                foreach ($question->conformities as $conformity) {
                    $total += $conformity->points;
                }
            }
        } elseif ($question->type === 'make_sentence') {

            foreach ($question->conformities as $conformity) {
                if ($conformity->checkAnswer($user)) {
                    $total += $conformity->points;
                }
            }

        } else {
            foreach ($question->conformities as $conformity) {
                if ($conformity->checkAnswer($user)) {
                    $total += $conformity->points;
                }
            }
        }

        $this->points = $total;
        $this->save();
    }

}
