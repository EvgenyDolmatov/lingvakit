<?php

namespace Database\Seeders;

use App\Models\MediaFile;
use Illuminate\Database\Seeder;

class MediaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MediaFile::create([
            'title' => 'Learn New Language',
            'filename' => 'image-1.jpg',
            'path' => 'test/img',
            'type' => 'image',
            'size' => '162026'
        ]);
        MediaFile::create([
            'title' => 'Buddha',
            'filename' => 'image-2.jpg',
            'path' => 'test/img',
            'type' => 'image',
            'size' => '146132'
        ]);
    }
}
