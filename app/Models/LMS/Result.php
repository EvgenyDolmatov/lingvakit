<?php

namespace App\Models\LMS;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'lms_results';

    protected $fillable = ['user_id', 'course_id', 'topic_id', 'status', 'attempt_quantity', 'points', 'started_at', 'finished_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function answers()
    {
        return $this->hasMany(ResultAnswer::class, 'result_id');
    }

    public function resultPoints()
    {
        return $this->hasMany(ResultPoint::class, 'result_id');
    }

    public static function add($user, $topic)
    {
        $result = new static();
        $result->user_id = $user->id;
        $result->course_id = $topic->stage->course->id;
        $result->topic_id = $topic->id;
        $result->attempt_quantity = 1;
        $result->save();

        return $result;
    }

    public function quizPassed()
    {
        $this->status = 'passed';
        $this->save();
    }

    public function quizFailed()
    {
        $this->status = 'not_passed';
        $this->save();
    }

    public function updateStatus($total)
    {
        $quiz = $this->topic->quiz;

        if ($total < $quiz->passing_score) {
            $this->quizFailed();
        } else {
            $this->quizPassed();
        }
    }

    public function getOrCreatePoints($question)
    {
        $point = ResultPoint::where([
            ['result_id', $this->id],
            ['question_id', $question->id],
        ])->first();

        if (!$point) {
            $point = ResultPoint::create([
                'result_id' => $this->id,
                'question_id' => $question->id,
            ]);
        }
        return $point;
    }

    public function setTotalPoints()
    {
        $totalPoints = 0;
        $resultPoints = $this->resultPoints;

        foreach ($resultPoints as $resultPoint) {
            $totalPoints += $resultPoint->points;
        }
        $this->points = $totalPoints;
        $this->save();
    }

    public function setTime($start)
    {
        $this->started_at = $start;
        $this->finished_at = now();
        $this->save();
    }

    public function getFinishedDate($date) : string
    {
        if (!$date) { return false; }
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y | H:i');
    }
}
