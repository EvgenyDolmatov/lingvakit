<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\LMS\Lesson;
use App\Models\LMS\Quiz;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function fixTopicsDatabase()
    {
        $lessons = Lesson::onlyTrashed()->get();
        $quizzes = Quiz::onlyTrashed()->get();

        foreach ($lessons as $l) {
            $topic = Topic::find($l->topic_id);

            if ($topic) {
                $topic->delete();
            }
        }
        foreach ($quizzes as $q) {
            $topic = Topic::find($q->topic_id);
            if ($topic) {
                $topic->delete();
            }
        }

        return redirect()->route('dashboard');
    }
}
