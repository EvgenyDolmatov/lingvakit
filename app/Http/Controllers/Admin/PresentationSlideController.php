<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\PresentationSlide;
use Illuminate\Http\Request;

class PresentationSlideController extends Controller
{
    public function updateIndex(Request $request, PresentationSlide $slide)
    {
        $slide->update($request->all());
        return response()->json();
    }
}
