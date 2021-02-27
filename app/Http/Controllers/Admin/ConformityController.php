<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Conformity;
use App\Models\LMS\Course;
use App\Models\LMS\ConformityOption;
use App\Models\LMS\Quiz;
use App\Models\LMS\Question;
use App\Models\LMS\Stage;
use App\Models\MediaFile;
use Illuminate\Http\Request;

class ConformityController extends Controller
{
    public function create(Course $course, Stage $stage, Quiz $quiz, Question $question)
    {
        $audio = MediaFile::where('type', 'audio')->orderBy('id', 'desc')->get();
        $images = MediaFile::where('type', 'image')->orderBy('id', 'desc')->get();

        return view('cms.courses.quizzes.questions.conformity.create', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'question' => $question,
            'audioFiles' => $audio,
            'images' => $images
        ]);
    }

    public function store(Request $request, Course $course, Stage $stage, Quiz $quiz, Question $question)
    {
        $request->validate([
            'points' => 'required',
        ]);

        if ($question->type === 'fill_the_gaps') {
            $request->validate([
                'matching_title' => 'required|string',
                'word_number' => 'required|string',
            ]);
        }

        if ($question->type === 'make_text') {
            $text = '';

            $sentences = $request->input('matching_title');
            foreach ($sentences as $key => $sentence) {
                if ($sentence) {
                    $text = $text . $sentence . ' ';
                }
            }

            $conformity = Conformity::create([
                'question_id' => $question->id,
                'title' => $text,
                'points' => $request->input('points')
            ]);

            foreach ($sentences as $sentence) {
                if ($sentence) {
                    ConformityOption::add($sentence, $conformity, 1);
                }
            }

        } else {
            $request->validate([
                'matching_title' => 'required|string',
            ]);

            $conformity = Conformity::add($request->all(), $question);
            $conformity->attachAudio($request->input('matching_audio'));
            $conformity->attachImage($request->input('matching_image'));

            if ($request->has('word_number')) {
                $conformity->addWordNumber($request->input('word_number'));
            }
            $conformity->addOptionByCondition($question->type, $request);
        }

        return redirect()->route('questions.show', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'question' => $question,
        ]);
    }

    public function edit(Course $course, Stage $stage, Quiz $quiz, Question $question, Conformity $conformity)
    {
        $audio = MediaFile::where('type', 'audio')->orderBy('id', 'desc')->get();
        $images = MediaFile::where('type', 'image')->orderBy('id', 'desc')->get();

        return view('cms.courses.quizzes.questions.conformity.edit', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'question' => $question,
            'conformity' => $conformity,
            'audioFiles' => $audio,
            'images' => $images
        ]);
    }

    public function update(Request $request, Course $course, Stage $stage, Quiz $quiz, Question $question, Conformity $conformity)
    {
        $request->validate([
            'points' => 'required',
        ]);

        foreach ($conformity->options as $option) {
            $option->delete();
        }

        if ($question->type === 'make_text') {
            $text = '';

            $sentences = $request->input('matching_title');
            foreach ($sentences as $key => $sentence) {
                if ($sentence) {
                    $text = $text . $sentence . ' ';
                }
            }
            $conformity->update([ 'title' => $text ]);

            foreach ($sentences as $sentence) {
                if ($sentence) {
                    ConformityOption::add($sentence, $conformity, 1);
                }
            }

        } else {
            $conformity->update([
                'title' => $request->input('matching_title'),
                'points' => $request->input('points'),
                'audio' => $request->input('matching_audio'),
                'image' => $request->input('matching_image'),
            ]);

            $conformity->addOptionByCondition($question->type, $request);
        }

        if ($request->has('word_number')) {
            $conformity->addWordNumber($request->input('word_number'));
        }

        return redirect()->route('questions.show', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'question' => $question,
        ]);
    }

    public function destroy(Course $course, Stage $stage, Quiz $quiz, Question $question, Conformity $conformity)
    {
        $conformity->remove();

        return redirect()->route('questions.show', [
            'course' => $course,
            'stage' => $stage,
            'quiz' => $quiz,
            'question' => $question,
        ]);
    }

    public function removeImage(Course $course, Stage $stage, Quiz $quiz, Question $question, Conformity $conformity)
    {
        $conformity->update(['image' => null]);
    }

    public function removeAudio(Course $course, Stage $stage, Quiz $quiz, Question $question, Conformity $conformity)
    {
        $conformity->update(['audio' => null]);
    }
}
