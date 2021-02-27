<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
        ]);

        $validator->after(function ($validator) use ($request) {

            if ($request->password != $request->password_confirmation) {
                $validator->errors()->add('password_confirmation', __("Passwords do not match!"));
            }
        });

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function verifyEmail()
    {
        $user = Auth::user();
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('site.my-courses');
        }
        return view('auth.verify-email', ['user' => $user]);
    }

    public function successVerification()
    {
        return view('auth.success-verification');
    }

    public function emailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('verification.success');
    }
}
