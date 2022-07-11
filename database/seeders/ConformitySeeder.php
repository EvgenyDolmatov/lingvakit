<?php

namespace Database\Seeders;

use App\Models\LMS\Conformity;
use App\Models\LMS\ConformityOption;
use Illuminate\Database\Seeder;

class ConformitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* QUESTION 1 (Single Choice) */
        $conformity1 = Conformity::create([
            'question_id' => 1,
            'title' => 'Anna and Kate _____ to the cinema last Sunday.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity1->id,
            'value' => 'didn’t went',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity1->id,
            'value' => 'don’t go',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity1->id,
            'value' => 'didn’t go',
            'is_correct' => 0,
        ]);

        $conformity2 = Conformity::create([
            'question_id' => 1,
            'title' => 'I had breakfast _____ ago.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity2->id,
            'value' => 'this morning',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity2->id,
            'value' => 'three hours',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity2->id,
            'value' => '7.30 a.m.',
            'is_correct' => 0,
        ]);

        /* QUESTION 2 (Multiple Choice) */
        $conformity3 = Conformity::create([
            'question_id' => 2,
            'title' => 'Найти общий делитель чисел 42 и 63.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity3->id,
            'value' => '3',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity3->id,
            'value' => '6',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity3->id,
            'value' => '12',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity3->id,
            'value' => '21',
            'is_correct' => 1,
        ]);

        $conformity4 = Conformity::create([
            'question_id' => 2,
            'title' => 'Найти общий делитель чисел 32 и 96.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity4->id,
            'value' => '8',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity4->id,
            'value' => '12',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity4->id,
            'value' => '24',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity4->id,
            'value' => '18',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity4->id,
            'value' => '24',
            'is_correct' => 1,
        ]);

        /* QUESTION 3 (Logic Choice) */
        $conformity5 = Conformity::create([
            'question_id' => 3,
            'title' => 'Самая короткая война в истории длилась 38 минут.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity5->id,
            'value' => 'true',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity5->id,
            'value' => 'false',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity5->id,
            'value' => 'no_answer',
            'is_correct' => 0,
        ]);

        $conformity6 = Conformity::create([
            'question_id' => 3,
            'title' => 'У осьминога четыре сердца.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity6->id,
            'value' => 'true',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity6->id,
            'value' => 'false',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity6->id,
            'value' => 'no_answer',
            'is_correct' => 0,
        ]);

        /* QUESTION 4 (Fill in the gaps) */
        $conformity7 = Conformity::create([
            'question_id' => 4,
            'title' => 'Anna and Kate to the cinema last Sunday.',
            'word_number' => 4,
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity7->id,
            'value' => "didn't went",
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity7->id,
            'value' => "don't go",
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity7->id,
            'value' => "didn't go",
            'is_correct' => 0,
        ]);

        $conformity8 = Conformity::create([
            'question_id' => 4,
            'title' => 'I had breakfast ago.',
            'word_number' => 3,
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity8->id,
            'value' => 'this morning',
            'is_correct' => 0,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity8->id,
            'value' => 'three hours',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity8->id,
            'value' => '7.30 a.m.',
            'is_correct' => 0,
        ]);

        /* QUESTION 5 (Matching) */
        $conformity9 = Conformity::create([
            'question_id' => 5,
            'title' => 'Russia',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity9->id,
            'value' => 'Bear',
            'is_correct' => 1,
        ]);

        $conformity10 = Conformity::create([
            'question_id' => 5,
            'title' => 'Australia',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity10->id,
            'value' => 'Kangaroo',
            'is_correct' => 1,
        ]);

        $conformity11 = Conformity::create([
            'question_id' => 5,
            'title' => 'China',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity11->id,
            'value' => 'Panda',
            'is_correct' => 1,
        ]);

        /* QUESTION 6 (Make sentence) */
        $conformity12 = Conformity::create([
            'question_id' => 6,
            'title' => 'I am from America.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity12->id,
            'value' => 'I',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity12->id,
            'value' => 'am',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity12->id,
            'value' => 'from',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity12->id,
            'value' => 'America',
            'is_correct' => 1,
        ]);

        $conformity13 = Conformity::create([
            'question_id' => 6,
            'title' => 'I was young.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity13->id,
            'value' => 'I',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity13->id,
            'value' => 'was',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity13->id,
            'value' => 'young',
            'is_correct' => 1,
        ]);

        /* QUESTION 7 (Make text) */
        $conformity14 = Conformity::create([
            'question_id' => 7,
            'title' => 'Billy always listens to his mother. He always does what she says. If his mother says, "Brush your teeth," Billy brushes his teeth.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity14->id,
            'value' => 'Billy always listens to his mother.',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity14->id,
            'value' => 'He always does what she says.',
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity14->id,
            'value' => 'If his mother says, "Brush your teeth," Billy brushes his teeth.',
            'is_correct' => 1,
        ]);

        $conformity15 = Conformity::create([
            'question_id' => 7,
            'title' => "Bobby woke up because he heard a dog. He heard a dog barking outside his window. Bobby woke up when he heard the dog barking.",
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity15->id,
            'value' => "Bobby woke up because he heard a dog.",
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity15->id,
            'value' => "He heard a dog barking outside his window.",
            'is_correct' => 1,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity15->id,
            'value' => "Bobby woke up when he heard the dog barking.",
            'is_correct' => 1,
        ]);

        /* QUESTION 8 (Short answer) */
        $conformity16 = Conformity::create([
            'question_id' => 8,
            'title' => 'Сумма чисел 5 и 8.',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity16->id,
            'value' => '13',
            'is_correct' => 1,
        ]);

        $conformity17 = Conformity::create([
            'question_id' => 8,
            'title' => 'Умножьте 4 на 12',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity17->id,
            'value' => '48',
            'is_correct' => 1,
        ]);

        /* QUESTION 9 (Listen and write) */
        $conformity18 = Conformity::create([
            'question_id' => 9,
            'title' => 'Предложение 1',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity18->id,
            'value' => 'Предложение 1',
            'is_correct' => 1,
        ]);

        $conformity19 = Conformity::create([
            'question_id' => 9,
            'title' => 'Предложение 2',
            'points' => 10,
        ]);
        ConformityOption::create([
            'conformity_id' => $conformity19->id,
            'value' => 'Предложение 2',
            'is_correct' => 1,
        ]);
    }
}
