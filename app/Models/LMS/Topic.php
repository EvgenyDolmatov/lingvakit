<?php

namespace App\Models\LMS;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_topics';

    protected $fillable = ['name', 'stage_id'];

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id', 'lms_stages');
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function getTitle()
    {
        if ($this->quiz) {
            return $this->quiz->title;
        }
        return $this->lesson->title;
    }

    public function getResult($user)
    {
        return Result::where([
            ['user_id', $user->id],
            ['topic_id', $this->id],
        ])->first();
    }

    public function getResultByUser($user) : string
    {
        $result = false;

        if ($user) {
            $result = Result::where([
                ['user_id', $user->id],
                ['topic_id', $this->id],
            ])->first();
        }

        if (!$result) {
            return 'not_passed';
        }
        return $result->status;
    }

    public function getCssClass($user) : string
    {
        if ($this->getResultByUser($user) === 'passed') {
            return 'text-success';
        }
        if ($this->getResultByUser($user) === 'not_passed') {
            return 'text-danger';
        }
        return '';
    }

    public function getAttemptQuantity($user)
    {
        $result = Result::where([
            'user_id' => $user->id,
            'topic_id' => $this->id
        ])->first();

        if (!$result) {return 0;}

        return $result->attempt_quantity;
    }

    public function getPreviousTopic()
    {
        return Topic::where([
            ['stage_id', $this->stage->id],
            ['id', '<', $this->id],
        ])->orderBy('id','desc')->first();
    }

    public function getNextTopic()
    {
        return Topic::where([
            ['stage_id', $this->stage->id],
            ['id', '>', $this->id],
        ])->orderBy('id','asc')->first();
    }
}
