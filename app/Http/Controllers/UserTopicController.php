<?php

namespace App\Http\Controllers;

use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonFile;
use App\Models\LMS\Question;
use App\Models\LMS\Quiz;
use App\Models\LMS\Result;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTopicController extends Controller
{
    public function showTopic(Course $course, Topic $topic)
    {
        $user = Auth::user();
        $previousTopic = $topic->getPreviousTopic();
        $nextTopic = $topic->getNextTopic();

        /* Default Data */
        $data = [
            'course' => $course,
            'topics' => $course->getTopics(),
            'topic' => $topic,
            'previousTopic' => $previousTopic,
            'nextTopic' => $nextTopic,
            'user' => $user
        ];
        /* If lesson */
        if ($topic->lesson) {
            $data['lesson'] = $topic->lesson;
            $data['result'] = $topic->getResult($user);
            $data['files'] = LessonFile::where('lesson_id', $topic->lesson->id)->get();
        }
        /* If Quiz */
        if ($topic->quiz) {
            $data['quiz'] = $topic->quiz;
            $data['totalResult'] = $topic->quiz->getPassing($user);
        }

        return view('site.course.topic.show', $data);
    }

    public function testing(Course $course, Topic $topic, Quiz $quiz)
    {
        $questions = Question::where('quiz_id', $quiz->id)->get();
        return view('site.course.quiz.testing', [
            'course' => $course,
            'topic' => $topic,
            'quiz' => $quiz,
            'questions' => $questions,
        ]);
    }

    public function bugWork(Course $course, Topic $topic, Quiz $quiz)
    {
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $user = Auth::user();

        $result = getResult($user, $quiz->topic);
        $conformityResult = $result->answers;

        return view('site.course.quiz.bug-work', [
            'course' => $course,
            'topic' => $topic,
            'quiz' => $quiz,
            'questions' => $questions,
            'user' => $user,
            'result' => $result,
            'conformityResult' => $conformityResult,
        ]);
    }

    public function passed(Request $request, Course $course, Topic $topic, Lesson $lesson)
    {
        $user = Auth::user();

        Result::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'topic_id' => $topic->id,
            'status' => 'passed'
        ]);

        $course->updateProgress($user);

        return redirect()->route('site.course-show', $course->id);
    }
}
