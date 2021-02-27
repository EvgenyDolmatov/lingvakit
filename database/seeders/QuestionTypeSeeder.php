<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lms_question_types')->insert([
            ['title' => 'single_choice'],
            ['title' => 'multiple_choice'],
            ['title' => 'logic_choice'],
            ['title' => 'fill_the_gaps'],
            ['title' => 'matching'],
            ['title' => 'make_sentence'],
            ['title' => 'make_text'],
            ['title' => 'short_answer'],
            ['title' => 'listen_write'],
        ]);
    }
}
