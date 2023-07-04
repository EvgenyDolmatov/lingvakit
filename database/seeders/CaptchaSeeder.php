<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaptchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('captcha_images')->insert([
            ['code' => 'chinese sticks', 'image_path' => 'captcha/captcha1.jpg'],
            ['code' => 'tower of london', 'image_path' => 'captcha/captcha2.jpg'],
            ['code' => 'french cheese', 'image_path' => 'captcha/captcha3.jpg'],
            ['code' => 'italian pasta', 'image_path' => 'captcha/captcha4.jpg'],
        ]);
    }
}
