<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('cms.dashboard');
    }

    public function profile()
    {
        return view('cms.profile.show', [
            'countries' => Country::all(),
            'user' => Auth::user()
        ]);
    }
}
