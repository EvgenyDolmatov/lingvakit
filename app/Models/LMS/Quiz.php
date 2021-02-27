<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_quizzes';

    protected $fillable = ['title', 'description', 'image', 'audio', 'video',
        'type', 'duration', 'passing_score', 'topic_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id', 'lms_topics');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function audio()
    {
        return $this->hasOne(MediaFile::class, 'id', 'audio');
    }

    public function image()
    {
        return $this->hasOne(MediaFile::class, 'id', 'image');
    }

    public function video()
    {
        return $this->hasOne(MediaFile::class, 'id', 'video');
    }

    public static function add($fields, $topic)
    {
        $quiz = new static();
        $quiz->fill($fields);
        $quiz->topic_id = $topic->id;
        $quiz->save();

        return $quiz;
    }

    public function addCategory($category)
    {
        if ($category) {
            $this->category_id = $category->id;
        } else {
            $this->category_id = Category::where('name', 'Uncategorized')->first()->id;
        }
        $this->save();
    }

    public function getImage() : string
    {
        if($this->image) {
            return $this->image()->first()->getPath();
        }
        return '/assets/cms/img/no-image.jpg';
    }

    public function getAudio() : string
    {
        if ($this->audio == null) {
            return false;
        }
        return $this->audio()->first()->getPath();
    }

    public function getVideo() : string
    {
        $video = $this->video;
        if($video && is_numeric($video)) {
            return $this->video()->first()->getPath();
        }
        return false;
    }

    public function isExternalVideo() : bool
    {
        $video = $this->video;
        if ($video && !is_numeric($video)) {
            return true;
        }
        return false;
    }

    public function remove()
    {
        $this->delete();
    }

    public function getVideoId() : string
    {
        $videoArr = explode('/', $this->video);
        return end($videoArr);
    }

    public function getDuration() : string
    {
        return formatDuration($this);
    }

    public function getResult($user)
    {
        return Result::where([
            ['user_id', $user->id],
            ['topic_id', $this->topic->id],
        ])->first();
    }

    /*public function getQtyCorrectAnswers($user) : int
    {
        $result = $this->getResult($user);
        if (!$result) { return false; }

        $correctAnswers = 0;

        foreach ($this->questions as $question) {

            if (in_array($question->type, ['single_choice','fill_the_gaps','logic_choice','listen_write'])) {
                foreach ($question->conformities as $conformity) {

                    $userAnswer = ResultAnswer::where([
                        ['result_id', $result->id],
                        ['question_id', $question->id],
                        ['conformity_id', $conformity->id],
                    ])->first();

                    if ($userAnswer && $userAnswer->is_correct == 1) {
                        $correctAnswers += 1;
                    }
                }
            }

            if ($question->type === 'multiple_choice') {
                foreach ($question->conformities as $conformity) {

                    $correctOptionIds = array();
                    $userAnswerIds = array();

                    $correctOptions = $conformity->options()->where('is_correct', 1)->get();

                    foreach ($correctOptions as $correctOption) {
                        $correctOptionIds[] = $correctOption->id;
                    }

                    $userAnswers = ResultAnswer::where([
                        ['result_id', $result->id],
                        ['question_id', $question->id],
                        ['conformity_id', $conformity->id],
                    ])->get();

                    foreach ($userAnswers as $userAnswer) {
                        $userAnswerIds[] = $userAnswer->option_id;
                    }

                    if (count($correctOptionIds) === count($userAnswerIds)) {
                        if (empty(array_diff($correctOptionIds, $userAnswerIds))) {
                            $correctAnswers += 1;
                        }
                    }
                }
            }

            if ($question->type === 'make_sentence' || $question->type === 'make_text') {
                foreach ($question->conformities as $conformity) {
                    $answers = array();

                    $userAnswers = ResultAnswer::where([
                        ['result_id', $result->id],
                        ['question_id', $question->id],
                        ['conformity_id', $conformity->id],
                    ])->get();

                    foreach ($userAnswers as $userAnswer) {
                        $answers[] = $userAnswer->is_correct;
                    }
                    if (!in_array(0, $answers)) {
                        $correctAnswers += 1;
                    }
                }
            }

            if ($question->type === 'short_answer') {
                foreach ($question->conformities as $conformity) {
                    $userAnswer = ResultAnswer::where([
                        ['result_id', $result->id],
                        ['question_id', $question->id],
                        ['conformity_id', $conformity->id],
                    ])->first();

                    if ($userAnswer && $userAnswer->is_correct == 1) {
                        $correctAnswers += 1;
                    }
                }
            }

            if ($question->type === 'matching') {

                $userAnswers = array();

                foreach ($question->conformities as $conformity) {

                    $userAnswer = ResultAnswer::where([
                        ['result_id', $result->id],
                        ['question_id', $question->id],
                        ['conformity_id', $conformity->id],
                    ])->first();

                    if ($userAnswer) {
                        $conformityOption = $conformity->options()->first();

                        if ($conformityOption->id === $userAnswer->option_id) {
                            $userAnswers[] = 1;
                        } else {
                            $userAnswers[] = 0;
                        }
                    }
                }

                if (!in_array(0, $userAnswers)) {
                    $correctAnswers += 1;
                }
            }
        }

        return $correctAnswers;
    }*/

    public function getTotalQuestions() : int
    {
        $totalQuestions = 0;

        $questions = $this->questions;

        foreach ($questions as $question) {
            if ($question->type !== 'matching') { $totalQuestions += count($question->conformities); }
            else { $totalQuestions += 1; }
        }

        return $totalQuestions;
    }

    public function getTotalPoints() : int
    {
        $total = 0;

        foreach ($this->questions as $question) {
            foreach ($question->conformities as $conformity) {
                $total += $conformity->points;
            }
        }
        return $total;
    }

    public function getTotalScore($user) : int
    {
        $totalPoints = $this->getTotalPoints();
        $userPoints = 0;

        $result = $this->getResult($user);

        if ($result) {
            $resultPoints = ResultPoint::where('result_id', $result->id)->get();
            foreach ($resultPoints as $resultPoint) {
                $userPoints += $resultPoint->points;
            }
        }

        return round(($userPoints*100)/$totalPoints);
    }

    public function getUserScore($user) : int
    {
        $points = 0;
        $result = $this->getResult($user);

        if ($result) {
            $points = $result->points;
        }
        return round($points);
    }

    public function showUserScore($user) : string
    {
        $class = $this->getClassByResult($user);
        return '<span class="'.$class.'">'.$this->getUserScore($user).'</span> / '.$this->getTotalPoints();
    }

    public function getPassing($user) : string
    {
        $result = $this->getResult($user);

        if ($result) {
            return __('site-pages.'.$result->status). ' (' .$this->getTotalScore($user) . '%)';
        }

        return 'Вы еще не проходили этот тест!';
    }

    public function quizPassed($user) : bool
    {
        $result = $this->getResult($user);

        if ($result) { return true; }
        return false;
    }

    public function showTotalQuestions() : string
    {
        $num = $this->getTotalQuestions();

        $locale = Lang::getLocale();
        $word = __("site-pages.question");

        $words = [$word, $word.'s', $word.'s'];

        if ($locale === 'ru') {
            $words = [$word, $word.'а', $word.'ов'];
        }

        $questionQty = changeWordEnding($num, $words);

        return $num. ' ' .$questionQty;
    }

    public function getTotalTime()
    {
        return $this->duration*60;
    }

    public function getSpentTime($user) {

        $result = $this->getResult($user);
        if (!$result) { return false; }

        $startedAt = Carbon::parse($result->started_at);
        $finishedAt = Carbon::parse($result->finished_at);

        return $startedAt->diffInSeconds($finishedAt, false);
    }

    public function showSpentTime($user) : string
    {
        $totalSeconds = $this->getSpentTime($user);

        if ($totalSeconds) {
            $seconds = $totalSeconds % 60;
            $minutes = floor($totalSeconds / 60);
            if ($seconds < 10) { $seconds = '0' . $seconds; }

            return $minutes . ':' . $seconds;
        }
        return '0:00';
    }

    public function getClassByResult($user) : string
    {
        $totalPoints = $this->getTotalPoints();
        $passingPercent = $this->passing_score;
        $userPoints = $this->getTotalScore($user);
        $passingPoints = ($totalPoints * $passingPercent)/100;

        if ($userPoints < $passingPoints) {
            return 'text-danger';
        }
        return 'text-success';
    }
}
