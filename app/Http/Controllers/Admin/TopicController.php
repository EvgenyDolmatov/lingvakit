<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function updateIndex(Request $request, $id)
    {
        $topic = Topic::find($id);
//        $topic->update($request->all());

        $topic->update(['index_number' => $request->index_number]);
//        $topic->index_number = $request->index_number;
//        $topic->save();



        return response()->json([
            'success' => 'Data Saved',
            'id' => $topic->id,
            'index' => $request->index_number,
        ]);

    }
}
