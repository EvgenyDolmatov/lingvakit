<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()
    {
        return view('cms.profile.settings.show');
    }

    public function studentShow()
    {
        return view('site.profile.settings.show');
    }

    public function update(Request $request)
    {
        $user = Auth::user()->id;
        $userSettings = Setting::where('user_id', $user)->first();
        $userSettings->update($request->all());

        return back();
    }
}
