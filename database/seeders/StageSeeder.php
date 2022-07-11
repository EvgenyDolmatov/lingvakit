<?php

namespace Database\Seeders;

use App\Models\LMS\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::create([
            'course_id' => 1,
            'name' => 'День 1'
        ]);
    }
}
