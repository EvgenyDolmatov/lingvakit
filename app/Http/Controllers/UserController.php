<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function infoUpdate(Request $request)
    {
        $user = Auth::user();

        if(strcmp(strtolower($user->email), strtolower($request->email)) !== 0){
            $request->validate([
                'name' => 'required|string|max:50',
                'surname' => 'required|string|max:50',
                'email' => 'required|unique:users|max:50',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:50',
                'surname' => 'required|string|max:50',
            ]);
        }

        $user->fill($request->all())->save();

        return back();
    }

    public function passwordUpdate(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
        ]);

        $validator->after(function ($validator) use ($user, $request) {
            if (! Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', __("Current Password is wrong!"));
            }

            if ($request->password != $request->password_confirmation) {
                $validator->errors()->add('password_confirmation', __("Passwords do not match!"));
            }
        });

        if (!$validator->errors()->any()) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return back()->withErrors($validator);
    }
}
