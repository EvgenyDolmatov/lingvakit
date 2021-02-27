<?php

namespace Database\Seeders;

use App\Models\LMS\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::create([
            'title' => 'Интенсивный курс по аудированию (ЕГЭ)',
            'description' => '<p>Развитие и тренировка аудитивных навыков в подготовке к ЕГЭ по китайскому языку</p>',
            'difficulty_level' => 'intermediate',
            'type' => 'free',
            'author_id' => 1,
            'category_id' => 2,
            'image' => 1,
            'is_new' => 1,
            'is_published' => 1
        ]);

        $course->students()->attach(1);
    }
}
