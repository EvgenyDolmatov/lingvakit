<?php

namespace Database\Seeders;

use App\Models\Rubric;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rubric::create(['title' => 'Без рубрики']);
        Rubric::create(['title' => 'Акции, специальные предложения']);
        Rubric::create(['title' => 'Бесплатные материалы']);
        Rubric::create(['title' => 'О культуре и истории Китая']);
        Rubric::create(['title' => 'Интересное о китае']);
        Rubric::create(['title' => 'Как создать свой курс']);
        Rubric::create(['title' => 'О разном']);
    }
}
