<?php

namespace App\Actions\Fortify;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if ($input['user_type'] === 'student') {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
                'agreement' => ['required'],
            ])->validate();

            $user = User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => Role::where('name', 'User')->first()->id,
            ]);
            $user->roles()->attach(Role::where('name', 'user')->first()->id);


        } else {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
                'agreement' => ['required'],
                'lease-contract' => ['required'],
            ])->validate();

            $user = User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => Role::where('name', 'Teacher')->first()->id,
            ]);
            $user->roles()->attach(Role::where('name', 'teacher')->first()->id);
        }

        Setting::create([
            'user_id' => $user->id,
            'locale' => 'ru',
        ]);

        return $user;
    }
}
