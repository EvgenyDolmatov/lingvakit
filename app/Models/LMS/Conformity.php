<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conformity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_conformity';

    protected $fillable = ['title', 'image', 'audio', 'word_number', 'question_id', 'points'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function options()
    {
        return $this->hasMany(ConformityOption::class, 'conformity_id');
    }

    public function answers()
    {
        return $this->hasMany(ResultAnswer::class, 'conformity_id');
    }

    public function answersByUser($result)
    {
        return $this->answers()->where('result_id', $result->id)->get();
    }

    public function image()
    {
        return $this->hasOne(MediaFile::class, 'id', 'image');
    }

    public function audio()
    {
        return $this->hasOne(MediaFile::class, 'id', 'audio');
    }

    public function getImage(): string
    {
        if ($this->image) {
            return $this->image()->first()->getPath();
        }
        return '/assets/cms/img/no-image.jpg';
    }

    public function getAudio(): string
    {
        if ($this->audio == null) {
            return false;
        }
        return $this->audio()->first()->getPath();
    }

    public function currentCourse()
    {
        return $this->question->quiz->topic->stage->course;
    }

    public function currentQuiz()
    {
        return $this->question->quiz;
    }

    public function currentQuestion()
    {
        return $this->question;
    }

    public static function add($fields, $question)
    {
        $conformity = new static();
        $conformity->fill($fields);
        $conformity->question_id = $question->id;
        $conformity->title = $fields['matching_title'];
        $conformity->save();

        return $conformity;
    }

    public function attachAudio($audio)
    {
        $this->audio = $audio;
        $this->save();
    }

    public function attachImage($image)
    {
        $this->image = $image;
        $this->save();
    }

    public function addOptionByCondition($questionType, $request)
    {
        // Matching
        if ($questionType === 'matching') {
            $request->validate(['question_option' => 'required|string']);

            $input = $request->input('question_option');
            ConformityOption::add($input, $this, 1);

            if ($request->has('question_extra_option')) {
                $extraOption = $request->input('question_extra_option');

                if (!empty($extraOption)) {
                    ConformityOption::add($extraOption, $this, 0);
                }
            }
        } // Make Sentence / Listen and Write
        elseif ($questionType === 'make_sentence') {
            foreach ($this->getSentenceWords() as $word) {
                ConformityOption::add($word, $this, 1);
            }
        } elseif ($questionType === 'listen_write') {
            $input = $request->input('matching_title');
            ConformityOption::add($input, $this, 1);
        } // Short Answer
        elseif ($questionType === 'short_answer') {
            $input = $request->input('question_option');
            ConformityOption::add($input, $this, 1);
        } // Single Choice, Multiple Choice, Logic Choice, Fill in the gaps
        elseif ($questionType === 'attach_file') {
            ConformityOption::add('teacher_decision', $this, 1);
        } else {
            $optionInputs = $request->input('question_option');
            foreach ($optionInputs as $key => $input) {
                if ($input) {
                    $result = 0;

                    if ($request->has('is_correct_' . ($key + 1))) {
                        $result = 1;
                    }
                    ConformityOption::create([
                        'value' => $input,
                        'conformity_id' => $this->id,
                        'is_correct' => $result,
                    ]);
                }
            }
        }
    }

    public function addWordNumber($wordNumber)
    {
        $this->word_number = $wordNumber;
        $this->save();
    }

    public function remove()
    {
        foreach ($this->options as $option) {
            $option->delete();
        }
        $this->delete();
    }

    public function getSentence(): string
    {
        $array = explode(' ', $this->title);

        $newSentence = '';
        $plug = '[ ... ]';

        array_splice($array, $this->word_number - 1, 0, $plug);

        foreach ($this->options as $option) {
            if ($option->is_correct === 1) {
                $plug = $option->value;
            }
        }

        foreach ($array as $key => $word) {
            if (($key + 1) == $this->word_number) {
                $word = '<span class="text-primary">' . $plug . '</span> ';
            }
            $newSentence = $newSentence . $word . ' ';
        }

        return $newSentence;
    }

    public function getSentenceForShortAnswer(): string
    {
        $words = $this->getSentenceWords();
        $sentence = '';

        foreach ($words as $key => $word) {
            foreach ($this->options as $option) {
                if ($word == $option->value) {
                    $word = '<span class="text-primary">' . $word . '</span> ';
                }
            }
            $sentence = $sentence . $word . ' ';
        }

        return trim($sentence) . '.';
    }

    public function getSentenceForQuiz(): string
    {
        $sentence = '';
        $words = $this->getSentenceWords();

        if ($this->question->type === 'fill_the_gaps') {

            $plug = ConformityOption::where([
                ['conformity_id', $this->id],
                ['is_correct', 1],
            ])->first();

            if ($plug) {
                array_splice($words, ($this->word_number - 1), 0, $plug->value);
            }

            $countOptions = count($this->options);
            $select = '';

            foreach ($words as $wordKey => $word) {
                foreach ($this->options as $key => $option) {
                    if ($key == 0) {
                        $select = '<select name="conformity_' . $this->id . '"><option value="" selected></option>';
                    }
                    $select = $select . '<option value="' . $option->id . '">' . $option->value . '</option>';
                    if (($key + 1) == $countOptions) {
                        $select = $select . '</select>';
                    }
                }
                if (($wordKey + 1) == $this->word_number) {
                    $word = $select;
                }
                $sentence = $sentence . $word . ' ';
            }

        } else {

            foreach ($words as $key => $word) {
                foreach ($this->options as $option) {
                    if ($word == $option->value) {
                        $word = '<input type="text" name="option_' . $option->id . '" class="short_word" autocomplete="off">';
                    }
                }
                $sentence = $sentence . $word . ' ';
            }
        }

        return trim($sentence) . '.';
    }

    /* Проверка на правильность ответа */
    public function checkAnswer($user): bool
    {
        $question = $this->question;
        $topic = $question->quiz->topic;
        $result = getResult($user, $topic);

        if ($question->type === 'make_sentence' || $question->type === 'make_text') {
            $answers = array();

            $userAnswers = getUserAnswers($result, $this);

            foreach ($userAnswers as $userAnswer) {
                $answers[] = $userAnswer->is_correct;
            }

            if (!in_array(0, $answers)) {
                return true;
            }

        } elseif (in_array($question->type, ['short_answer', 'listen_write'])) {

            $userAnswer = getUserAnswer($result, $this);

            if ($userAnswer && $userAnswer->is_correct == 1) {
                return true;
            }

        } else {

            $rightAnswers = ConformityOption::where([
                ['conformity_id', $this->id],
                ['is_correct', 1]
            ])->get();

            $userAnswers = ResultAnswer::where([
                ['result_id', $result->id],
                ['conformity_id', $this->id],
            ])->get();

            $rightArray = array();
            $userArray = array();

            foreach ($rightAnswers as $rightAnswer) {
                $rightArray[] = $rightAnswer->id;
            }
            foreach ($userAnswers as $userAnswer) {
                $userArray[] = $userAnswer->option_id;
            }

            if (count($rightArray) === count($userArray)) {
                if (!array_diff($rightArray, $userArray)) {
                    return true;
                }
            }

        }

        return false;
    }

    public function isCorrect($user): bool
    {
        $option = ConformityOption::where([
            ['conformity_id', $this->id],
            ['is_correct', 1]
        ])->first();

        $result = $this->question->quiz->getResult($user);
        $answer = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->id],
        ])->first();

        if ($answer && $option)  {
            if ( $option->id === $answer->option_id ) {
                return true;
            }
        }
/*        if (($answer && $option) && $option->id === $answer->option_id) {
            return true;
        }*/
        return false;
    }

    public function getSentenceForBugQuiz($user): string
    {
        $sentence = '';
        $words = $this->getSentenceWords();
        $answer = $this->answers()->first();

        $answer ?
            $option = ConformityOption::find($answer->option_id) :
            $option = false;

//        $option = false;
        /*if ($answer) {
            $option = ConformityOption::find($answer->option_id);
        }*/

        if ($option) {
            $plug = ConformityOption::find($answer->option_id)->value;
            array_splice($words, ($this->word_number - 1), 0, $plug);

            foreach ($words as $key => $word) {
                if (($key + 1) == $this->word_number) {
                    if ($this->isCorrect($user)) {
                        $word = '<span class="text-success">' . $word . '</span>';
                    } else {
                        $word = '<span class="text-danger">' . $word . '</span>';
                    }
                }
                $sentence = $sentence . $word . ' ';
            }
        }

        return trim($sentence) . '.';
    }

    public function getSentenceWords(): array
    {
        $signs = ['.', ',', '!'];
        $string = str_replace($signs, '', $this->title);

        /*        $isChinese = isChineseCharacters($string);
                if ($isChinese) {
                    return mb_str_split($string); //
                }*/
        return explode(' ', $string);
    }

    public function getOptionIdByAnswer($user)
    {
        $result = $this->question->quiz->getResult($user);
        $answer = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->id],
        ])->first();

        $option = ConformityOption::find($answer->option_id);

        if (!$option) {
            return false;
        }
        return $option->id;
    }

    public function getOptionValueByAnswer($user)
    {
        $result = $this->question->quiz->getResult($user);
        $answer = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->id],
        ])->first();

        $option = ConformityOption::find($answer->option_id);

        if (!$option) {
            return false;
        }
        return $option->value;
    }

    public function getAnswerByUser($user)
    {
        $result = $this->question->quiz->getResult($user);
        $answer = ResultAnswer::where([
            ['result_id', $result->id],
            ['conformity_id', $this->id],
        ])->first();

        if ($answer) {
            return $answer->value;
        }
        return false;
    }

    public function getClassByAnswer($user): string
    {
        $originAnswer = simplifySentence($this->options()->first()->value);
        $userAnswer = simplifySentence($this->getAnswerByUser($user));

        if ($this->question->type === 'listen_write') {
            if ($originAnswer == $userAnswer) {
                return 'text-success';
            }
            return 'text-danger';
        } elseif ($this->question->type === 'short_answer') {
            if ($this->getAnswerByUser($user) == $this->options()->first()->value) {
                return 'text-success';
            }
            return 'text-danger';
        } else {
            if ($this->isCorrect($user)) {
                return 'item-success';
            }
        }
        return 'item-danger';
    }

    /*
     * Get Correct Matching for "Matching Question"
     */
    public function getCorrectMatchingOption()
    {
        $correctOption = $this->options()->where('is_correct', 1)->first();

        if (!$correctOption) {
            return false;
        }
        return $correctOption->value;
    }

    /*
     *  Get Incorrect Matching for "Matching Question"
     */
    public function getIncorrectMatchingOption()
    {
        $incorrectOption = $this->options()->where('is_correct', 0)->first();

        if (!$incorrectOption) {
            return false;
        }
        return $incorrectOption->value;
    }
}
