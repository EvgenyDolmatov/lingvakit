<?php

namespace App\Http\Controllers;

use App\Models\LMS\Conformity;
use App\Models\LMS\Course;
use App\Models\LMS\ConformityOption;
use App\Models\LMS\Quiz;
use App\Models\LMS\Result;
use App\Models\LMS\ResultAnswer;
use App\Models\LMS\ResultPoint;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserResultController extends Controller
{
    public function store(Request $request, Course $course, Topic $topic, Quiz $quiz)
    {
        $questions = $quiz->questions;

        $user = Auth::user();
        $result = $topic->getResult($user);

        if (!$result) {
            $result = Result::add($user, $quiz->topic);
        } else {
            $attempt = $result->attempt_quantity+1;
            $result->update(['attempt_quantity' => $attempt]);

            $currentAnswers = ResultAnswer::where('result_id', $result->id)->get();
            foreach ($currentAnswers as $currentAnswer) {
                $currentAnswer->delete();
            }
        }
        $result->setTime($request->input('started_at'));

        foreach ($questions as $question) {

            $conformityList = Conformity::where('question_id', $question->id)->get();

            foreach ($conformityList as $conformity) {

                $inputName = 'conformity_' . $conformity->id;

                /* "Make Sentence" & "Make Text" */
                if (in_array($question->type, ['make_sentence','make_text'])) {
                    foreach ($conformity->options as $option) {
                        if ($request->has('option_' . $option->id)) {

                            $isCorrect = 0;
                            $input = $request->input('option_' . $option->id);

                            if ($input) {
                                if ($option->id == $input) {
                                    $isCorrect = 1;
                                }

                                ResultAnswer::create([
                                    'result_id' => $result->id,
                                    'question_id' => $question->id,
                                    'conformity_id' => $conformity->id,
                                    'option_id' => $input,
                                    'is_correct' => $isCorrect,
                                ]);
                            } else {
                                ResultAnswer::create([
                                    'result_id' => $result->id,
                                    'question_id' => $question->id,
                                    'conformity_id' => $conformity->id,
                                    'option_id' => $option->id,
                                    'is_correct' => $isCorrect,
                                ]);
                            }
                        }
                    }
                }

                /* Listen and Write */
                if ($question->type === 'listen_write') {

                    if ($request->has($inputName)) {
                        $isCorrect = 0;
                        $input = $request->input($inputName);

                        $originSentence = simplifySentence($conformity->title);
                        $userAnswer = simplifySentence($input);

                        if ($originSentence == $userAnswer) { $isCorrect = 1; }
                        if ($input) {
                            ResultAnswer::create([
                                'result_id' => $result->id,
                                'question_id' => $question->id,
                                'conformity_id' => $conformity->id,
                                'option_id' => $conformity->options()->first()->id,
                                'value' => $input,
                                'is_correct' => $isCorrect,
                            ]);
                        }
                    }
                }
                /* Attach File */
                if ($question->type === 'attach_file') {
                    if ($request->input($inputName)) {
                        ResultAnswer::create([
                            'result_id' => $result->id,
                            'question_id' => $question->id,
                            'conformity_id' => $conformity->id,
                            'option_id' => $conformity->options()->first()->id,
                            'value' => 1,
                            'is_correct' => 0,
                        ]);
                    }
                }
                /* Short Answer */
                if ($question->type === 'short_answer') {

                    if ($request->has($inputName)) {
                        $isCorrect = 0;
                        $input = $request->input($inputName);

                        if ($conformity->options()->first()->value == $input) {
                            $isCorrect = 1;
                        }

                        if ($input) {
                            ResultAnswer::create([
                                'result_id' => $result->id,
                                'question_id' => $question->id,
                                'conformity_id' => $conformity->id,
                                'option_id' => $conformity->options()->first()->id,
                                'value' => $input,
                                'is_correct' => $isCorrect,
                            ]);
                        }
                    }
                }

                if ($request->has($inputName)) {

                    /* "Single Choice" or "Fill in the Gaps" */
                    if ($question->type === 'single_choice' || $question->type === 'logic_choice') {
                        $input = $request->input($inputName);
                        $option = ConformityOption::find($input);

                        ResultAnswer::add($result, $question, $conformity, $option);
                    }

                    if ($question->type === 'fill_the_gaps') {
                        $input = $request->input($inputName);
                        $option = ConformityOption::find($input);

                        if ($option) {
                            ResultAnswer::add($result, $question, $conformity, $option);
                        }
                    }

                    /* Multiple Choice */
                    if ($question->type === 'multiple_choice') {
                        foreach ($request->input($inputName) as $input) {
                            $option = ConformityOption::find($input);
                            ResultAnswer::add($result, $question, $conformity, $option);
                        }
                    }

                    /* Matching */
                    if ($question->type === 'matching') {

                        $isCorrect = 0;
                        $points = 0;

                        $input = $request->input($inputName);
                        $option = ConformityOption::find($input);

                        if ($conformity->options()->first()->id == $input) {
                            $isCorrect = 1;
                            $points = $conformity->points;
                        }

                        if ($option) {
                            ResultAnswer::create([
                                'result_id' => $result->id,
                                'question_id' => $question->id,
                                'conformity_id' => $conformity->id,
                                'option_id' => $option->id,
                                'is_correct' => $isCorrect,
                                'points' => $points,
                            ]);
                        } else {
                            $optionsIds = array();
                            foreach ($question->conformities as $qConformity) {
                                $optionsIds[] = $qConformity->options()->first()->id;
                            }

                            $option = ConformityOption::find($optionsIds[array_rand($optionsIds, 1)]);

                            ResultAnswer::create([
                                'result_id' => $result->id,
                                'question_id' => $question->id,
                                'conformity_id' => $conformity->id,
                                'option_id' => $option->id,
                                'is_correct' => $isCorrect,
                                'points' => $conformity->points,
                            ]);
                        }
                    }
                }
                $resultPoints = $result->getOrCreatePoints($question); // Get Result Points
                $resultPoints->setPoints($user, $question); // Set Result Points Quantity
            }

        }

        $totalScore = $quiz->getTotalScore($user);
        $result->setTotalPoints();
        $result->updateStatus($totalScore);
        $course->updateProgress($user);

        return redirect()->route('site.show-topic', [$course->id, $topic->id]);
    }
}
