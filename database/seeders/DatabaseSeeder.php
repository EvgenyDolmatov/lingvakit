<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            OrderStatusSeeder::class,
            MediaFileSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            StageSeeder::class,
            QuizSeeder::class,
            QuestionTypeSeeder::class,
            QuestionSeeder::class,
            ConformitySeeder::class,
            RubricSeeder::class,
        ]);
    }
}
