<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonVideo;
use App\Models\LMS\Stage;
use Illuminate\Http\Request;

class LessonVideoController extends Controller
{
    public function attachVideoView(Course $course, Stage $stage, Lesson $lesson)
    {
        return view('cms.courses.videos.attach', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson,
        ]);
    }

    public function attachVideo(Request $request, Course $course, Stage $stage, Lesson $lesson)
    {
        $request->validate([
            'video' => 'required'
        ]);

        LessonVideo::create([
            'lesson_id' => $lesson->id,
            'video' => $request->video,
            'poster' => $request->image
        ]);

        return redirect()->route('courses.show', $course);
    }

    public function detachVideo(Course $course, Stage $stage, Lesson $lesson, LessonVideo $video)
    {
        $video->delete();
        return back();
    }
}
