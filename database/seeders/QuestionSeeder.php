<?php

namespace Database\Seeders;

use App\Models\LMS\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'title' => 'Новый вопрос: "Одиночный выбор"',
            'image' => 1,
            'type' => 'single_choice',
            'quiz_id' => 1,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Множественный выбор"',
            'image' => 1,
            'type' => 'multiple_choice',
            'quiz_id' => 2,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Логический выбор"',
            'image' => 1,
            'type' => 'logic_choice',
            'quiz_id' => 3,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Заполнить пропуски"',
            'image' => 1,
            'type' => 'fill_the_gaps',
            'quiz_id' => 4,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Соответствие"',
            'image' => 1,
            'type' => 'matching',
            'quiz_id' => 5,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Составить предложение"',
            'image' => 1,
            'type' => 'make_sentence',
            'quiz_id' => 6,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Составить текст"',
            'image' => 1,
            'type' => 'make_text',
            'quiz_id' => 7,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Короткий ответ"',
            'image' => 1,
            'type' => 'short_answer',
            'quiz_id' => 8,
            'font_size' => 'normal',
        ]);
        Question::create([
            'title' => 'Новый вопрос: "Прослушать и записать"',
            'image' => 1,
            'type' => 'listen_write',
            'quiz_id' => 9,
            'font_size' => 'normal',
        ]);
    }
}
