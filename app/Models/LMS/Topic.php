<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_topics';

    protected $fillable = ['name', 'stage_id', 'index_number'];

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

    public function getTitle() : string
    {
        $title = false;

        if ($this->quiz) {
            $title = $this->quiz->title;
        }
        if ($this->lesson) {
            $title = $this->lesson->title;
        }
        return $title;
    }

    public function getResult($user)
    {
        return Result::where([
            ['user_id', $user->id],
            ['topic_id', $this->id],
        ])->first();
    }

    public function getResultByUser($user): string
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
        $result = $this->getResult($user);
        if (!$result) {return 0;}

        return $result->attempt_quantity;
    }

    public function getFinishedDate($user)
    {
        $result = $this->getResult($user);
        if (!$result) {return false;}

        return $result->getFinishedDate($result->finished_at);
    }

    public function prevStage()
    {
        $currentStage = $this->stage;
        $currentCourse = $currentStage->course;
        $courseStages = $currentCourse->stages;

        foreach ($courseStages as $key => $courseStage) {
            if ($courseStage->id === $currentStage->id && $key-1 >= 0 ) {
                return Stage::find($courseStages[$key - 1]->id);
            }
        }
        return false;
    }

    public function nextStage()
    {
        $currentStage = $this->stage;
        $currentCourse = $currentStage->course;
        $courseStages = $currentCourse->stages;

        foreach ($courseStages as $key => $courseStage) {
            if ($courseStage->id === $currentStage->id && count($courseStages) > $key+1) {
                return Stage::find($courseStages[$key + 1]->id);
            }
        }
        return false;
    }

    public function getPreviousTopic()
    {
        $currentStage = $this->stage;
        $prevStage = $this->prevStage();

        $prevTopic = Topic::where([
            ['stage_id', $currentStage->id],
            ['id', '<', $this->id],
        ])->orderBy('id', 'desc')->first();

        if (!$prevTopic && $prevStage) {
            $prevTopic = Topic::where('stage_id', $prevStage->id)->first();
        }

        return $prevTopic;
    }

    public function getNextTopic()
    {
        $currentStage = $this->stage;
        $nextStage = $this->nextStage();

        $nextTopic = Topic::where([
            ['stage_id', $currentStage->id],
            ['id', '>', $this->id],
        ])->orderBy('id','asc')->first();

        if (!$nextTopic && $nextStage) {
            $nextTopic = Topic::where('stage_id', $nextStage->id)->first();
        }

        if ($nextTopic  && $nextTopic->name === 'quiz' && is_null($nextTopic->quiz) ) {

            $currentCourse = $currentStage->course;
            $courseStages = $currentCourse->stages;

            foreach ($courseStages as $stage) {
                foreach ($stage->topics as $key => $topic) {

                    if ($topic->id === $this->id) {

                        if (count($stage->topics) > $key+2) {
                            $nextTopic = $stage->topics[$key+2];

                        } else {
                            if ($nextStage) {
                                $nextTopic = Topic::where('stage_id', $nextStage->id)->first();
                            }
                        }

                    }
                }
            }
        }
        return $nextTopic;
    }
}
