<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConformityOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_conformity_options';

    protected $fillable = ['value', 'conformity_id', 'is_correct'];

    public function conformity()
    {
        return $this->belongsTo(Conformity::class, 'conformity_id');
    }

    public static function add($input, $conformity, $result)
    {
        $option = new static();
        $option->value = $input;
        $option->conformity_id = $conformity->id;
        $option->is_correct = $result;
        $option->save();

        return $option;
    }

    public function getWordNumber() : int
    {
        $wordNumber = false;
        $conformity = $this->conformity;

        foreach ($conformity->getSentenceWords() as $key => $word) {
            if ($this->value == $word) {
                $wordNumber = $key+1;
            }
        }

        return $wordNumber;
    }

    public function getUserAnswer($user) : bool
    {
        $result = $this->conformity->question->quiz->getResult($user);
        $answers = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->conformity->id],
        ])->get();

        foreach ($answers as $answer) {
            if ($this->id === $answer->option_id) {
                return true;
            }
        }
        return false;
    }

    public function getClassByAnswer($user)
    {
        $result = $this->conformity->question->quiz->getResult($user);
        $answers = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->conformity->id],
        ])->get();

        foreach ($answers as $answer) {
            if ($this->getUserAnswer($user)) {
                if ($this->is_correct === 1) {
                    return 'text-success';
                }
                return 'text-danger';
            }
        }
        return false;
    }
}
