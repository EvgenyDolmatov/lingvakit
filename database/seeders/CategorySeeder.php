<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lms_categories')->insert([
            ['name' => 'Uncategorized','label' => 'uncategorized'],
            ['name' => 'Аудирование','label' => 'audirovanie'],
            ['name' => 'Грамматика','label' => 'grammatika'],
            ['name' => 'Чтение','label' => 'chtenie'],
        ]);
    }
}
