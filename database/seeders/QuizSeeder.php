<?php

namespace Database\Seeders;

use App\Models\LMS\Quiz;
use App\Models\LMS\Topic;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 9;
        for ($i = 1; $i <= $count; $i++) {
            Topic::create([
                'stage_id' => 1,
                'name' => 'quiz',
            ]);
        }

        Quiz::create([
            'title' => 'Тест (одиночный выбор)',
            'description' => 'Тест (одиночный выбор)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 1,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (множественный выбор)',
            'description' => 'Тест (множественный выбор)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 2,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (логический выбор)',
            'description' => 'Тест (логический выбор)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 3,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (заполнить пропуски)',
            'description' => 'Тест (заполнить пропуски)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 4,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (соответствие)',
            'description' => 'Тест (соответствие)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 5,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (составить предложение)',
            'description' => 'Тест (составить предложение)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 6,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (составить текст)',
            'description' => 'Тест (составить текст)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 7,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (короткий ответ)',
            'description' => 'Тест (короткий ответ)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 8,
            'category_id' => 2,
        ]);

        Quiz::create([
            'title' => 'Тест (прослушать и записать)',
            'description' => 'Тест (прослушать и записать)',
            'image' => 1,
            'passing_score' => 70,
            'topic_id' => 9,
            'category_id' => 2,
        ]);
    }
}
