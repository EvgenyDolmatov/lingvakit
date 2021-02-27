<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_questions';

    protected $fillable = ['title', 'image', 'type', 'quiz_id', 'explanation', 'font_size'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id', 'lms_quizzes');
    }

    public function conformities() {
        return $this->hasMany(Conformity::class, 'question_id');
    }

    public function image()
    {
        return $this->hasOne(MediaFile::class, 'id', 'image');
    }

    public function audios()
    {
        return $this->hasMany(QuestionAudio::class, 'question_id');
    }

    public static function add($fields, $quiz, $questionType)
    {
        $question = new static();
        $question->fill($fields);
        $question->quiz_id = $quiz->id;
        $question->title = $fields['question_title'];
        $question->type = $questionType;
        $question->save();

        return $question;
    }

    public function attachImage($image)
    {
        $this->image = $image;
        $this->save();
    }

    public function getImage() : string
    {
        if($this->image) {
            return $this->image()->first()->getPath();
        }
        return '/assets/cms/img/no-image.jpg';
    }

    public function remove()
    {
        foreach ($this->conformities as $conformity) {
            $conformity->remove();
        }
        foreach ($this->audios as $audio) {
            $audio->remove();
        }
        $this->delete();
    }

    public function getFontSize()
    {
        if ($this->font_size === 'large') {
            return 'font-large';
        }
        if ($this->font_size === 'huge') {
            return 'font-huge';
        }
        return false;
    }

    public function conformityHasImage() : bool
    {
        foreach ($this->conformities as $conformity) {
            if ($conformity->image) {
                return true;
            }
        }
        return false;
    }

    public function checkAnswer($user) : bool
    {
        $type = $this->type;
        $topic = $this->quiz->topic;
        $result = getResult($user, $topic);

        foreach ($this->conformities as $conformity) {

            if ($type === 'matching') {
                $rightAnswer = $conformity->options()->first();
                $userAnswer = getUserAnswer($result, $conformity);

                if ($userAnswer) {
                    if ($rightAnswer->id !== $userAnswer->option_id) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
