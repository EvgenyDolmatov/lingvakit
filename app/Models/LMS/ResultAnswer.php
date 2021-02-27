<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultAnswer extends Model
{
    use HasFactory;

    protected $table = 'lms_result_answers';

    protected $fillable = ['result_id', 'question_id', 'conformity_id', 'option_id', 'value', 'is_correct'/*, 'points'*/];

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function conformity()
    {
        return $this->belongsTo(Conformity::class, 'conformity_id');
    }

    public static function add($result, $question, $conformity, $option)
    {
//        $cPoints = $conformity->points;
//        if ($option->is_correct !== 1) {
//            $cPoints = 0;
//        }

        $answer = new static();
        $answer->result_id = $result->id;
        $answer->question_id = $question->id;
        $answer->conformity_id = $conformity->id;
        $answer->option_id = $option->id;
        $answer->is_correct = $option->is_correct;
//        $answer->points = $cPoints;
        $answer->save();

        return $answer;
    }

    public function getOptionValue($user) : string
    {
        $option = ConformityOption::find($this->option_id);
        if (!$option) {return false;}
        return $option->value;
    }

    public function getClassByValue() : string
    {
        if ($this->is_correct === 1) {
            return 'text-success';
        }
        return 'text-danger';
    }
}
