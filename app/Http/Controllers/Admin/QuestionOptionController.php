<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\ConformityOption;
use App\Models\LMS\Quiz;
use App\Models\LMS\Question;
use App\Models\LMS\Stage;
use Illuminate\Http\Request;

class QuestionOptionController extends Controller
{
    public function changeIsCorrect(
        Request $request, Course $course, Stage $stage, Quiz $quiz, Question $question, ConformityOption $option
    )
    {
        if ($question->type === 'multiple_choice') {

            if ($request->has('option_'.$option->id)) {
                $option->update(['is_correct' => 1]);
            } else {
                $option->update(['is_correct' => 0]);
            }

        } else {

            foreach ($option->conformity->options as $cOption) {
                $cOption->update(['is_correct' => 0]);
            }
            $option->update(['is_correct' => 1]);

        }

        return redirect()->back();
    }
}
