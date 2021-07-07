<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function updateIndex(Request $request, Topic $topic)
    {
        $topic->update($request->all());
        return response()->json();
    }
}
