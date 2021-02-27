<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();

        /* Admin */
        $user1 = User::create([
            'surname' => 'Lingvakit',
            'name' => 'Admin',
            'email' => 'lingvakit@mail.ru',
            'password' => Hash::make('00000000'),
            'is_staff' => 1,
            'email_verified_at' => now()
        ]);
        $user1->assignRole($admin);

        /* Manager */
        $user2 = User::create([
            'surname' => 'Иван',
            'name' => 'Семенов',
            'email' => 'ivan@gmail.com',
            'password' => Hash::make('00000000'),
            'is_staff' => 1,
            'email_verified_at' => now()
        ]);
        $user2->assignRole($manager);

        User::create([
            'surname' => 'Смирнова',
            'name' => 'Дарья',
            'patronymic' => 'Владимировна',
            'email' => 'smirnova@mail.ru',
            'password' => Hash::make('00000000'),
        ]);

        User::create([
            'surname' => 'Анисимова',
            'name' => 'Кристина',
            'patronymic' => 'Алексеевна',
            'email' => 'anisimova@mail.ru',
            'password' => Hash::make('00000000'),
        ]);
    }
}
