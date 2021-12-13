<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Category;
use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\QuestionType;
use App\Models\LMS\Quiz;
use App\Models\LMS\Stage;
use App\Models\LMS\Topic;
use App\Models\MediaFile;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Course $course, Stage $stage)
    {
        $uncategorized = Category::where('name', 'Uncategorized')->first();
        $audio = MediaFile::where('type', 'audio')->orderBy('id', 'desc')->get();
        $images = MediaFile::where('type', 'image')->orderBy('id', 'desc')->get();

        return view('cms.courses.quizzes.create', [
            'categories' => Category::all()->except($uncategorized->id),
            'course' => $course,
            'stage' => $stage,
            'audioFiles' => $audio,
            'images' => $images
        ]);
    }

    public function store(Request $request, Course $course, Stage $stage)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
            'passing_score' => 'required|numeric',
        ]);

        if ($request->has('category_id')) {
            $category = Category::find($request->input('category_id'));
            if ($request->input('category_id') == 0) {
                $category = Category::create(['name' => $request->input('category')]);
            }
        } else {
            $category = Category::find(1);
        }

        $passed_topics = $request->input('passed_topics');
        if ($passed_topics) {
            $passed_topics = implode(',', $passed_topics);
        }

        $topic = Topic::create([
            'name' => 'quiz',
            'stage_id' => $stage->id,
            'passed_topics' => $passed_topics,
        ]);
        $topic->update(['index_number' => $topic->id,]);
        $quiz = Quiz::add($request->all(), $topic);
        $quiz->addCategory($category);

        $course->updateDuration();

        return redirect()->route('quizzes.show', [$course->id, $stage->id, $quiz->id]);
    }

    public function show(Course $course, Stage $stage, Quiz $quiz)
    {
        return view('cms.courses.quizzes.show', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'questionTypes' => QuestionType::all(),
        ]);
    }

    public function edit(Course $course, Stage $stage, Quiz $quiz)
    {
        $uncategorized = Category::where('name', 'Uncategorized')->first();
        $audio = MediaFile::where('type', 'audio')->orderBy('id', 'desc')->get();
        $images = MediaFile::where('type', 'image')->orderBy('id', 'desc')->get();

        return view('cms.courses.quizzes.edit', [
            'categories' => Category::all()->except($uncategorized->id),
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'audioFiles' => $audio,
            'images' => $images
        ]);
    }

    public function update(Request $request, Course $course, Stage $stage, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
            'passing_score' => 'required|numeric',
        ]);

        if ($request->has('category_id')) {
            $category = Category::find($request->input('category_id'));
            if ($request->input('category_id') == 0) {
                $category = Category::create(['name' => $request->input('category')]);
            }
        } else {
            $category = Category::find(1);
        }

        $passed_topics = $request->input('passed_topics');

        $quiz->update($request->all());
        $quiz->addCategory($category);
        $quiz->topic->addRequiredTopics($passed_topics);

        $course->updateDuration();

        return redirect()->route('quizzes.show', [$course->id, $stage->id, $quiz->id]);
    }

    public function destroy(Course $course, Stage $stage, Quiz $quiz)
    {
        $quiz->remove();
        $course->updateDuration();

        return redirect()->route('courses.show', $course->id);
    }

    public function removeImage(Course $course, Stage $stage, Quiz $quiz)
    {
        $quiz->update(['image' => null]);
    }

    public function removeAudio(Course $course, Stage $stage, Quiz $quiz)
    {
        $quiz->update(['audio' => null]);
    }

    public function removeVideo(Course $course, Stage $stage, Quiz $quiz)
    {
        $quiz->update(['video' => null]);
    }
}
