<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResultAnswer extends Model
{
    use HasFactory;

    protected $table = 'lms_result_answers';

    protected $fillable = ['result_id', 'question_id', 'conformity_id', 'option_id', 'value', 'is_correct'];

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
        $answer = new static();
        $answer->result_id = $result->id;
        $answer->question_id = $question->id;
        $answer->conformity_id = $conformity->id;
        $answer->option_id = $option->id;
        $answer->is_correct = $option->is_correct;
        $answer->save();

        return $answer;
    }

    public function uploadFile($file, $teacher)
    {
        $currentUser = Auth::user();
        if ($file == null) {return;}

        $ext = $file->extension();
        $filename = 'student_'.$currentUser->id.'_'.time().'.'.$ext;
        $path = 'students/teacher-'.$teacher;

        $file->storeAs($path.'/', $filename, 'uploads');

        $this->value = $path.'/'.$filename;
        $this->save();

    }

    public function removeFile()
    {
        if ($this->value != null) {
            Storage::disk('uploads')->delete($this->value);
            $this->delete();
        }
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
