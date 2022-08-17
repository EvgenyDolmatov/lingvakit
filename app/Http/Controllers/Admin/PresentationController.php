<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonPresentation;
use App\Models\LMS\PresentationSlide;
use App\Models\LMS\Stage;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Course $course, Stage $stage, Lesson $lesson)
    {
        return view('cms.courses.presentations.create', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson,
        ]);
    }

    public function store(Request $request, Course $course, Stage $stage, Lesson $lesson)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $pres = LessonPresentation::add($request->all(), $lesson);

        if ($request->input('slide_images')) {
            foreach ($request->input('slide_images') as $key => $slideNum) {
                PresentationSlide::create([
                    'presentation_id' => $pres->id,
                    'image' => $slideNum,
                    'slide_number' => $key+1,
                ]);
            }
        }

        return redirect()->route('courses.show', $course);
    }

    public function show(Course $course, Stage $stage, Lesson $lesson, LessonPresentation $presentation)
    {
        return view('cms.courses.presentations.show', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson,
            'presentation' => $presentation
        ]);
    }

    public function edit(Course $course, Stage $stage, Lesson $lesson, LessonPresentation $presentation)
    {
        return view('cms.courses.presentations.edit', [
            'course' => $course,
            'lesson' => $lesson,
            'stage' => $stage,
            'presentation' => $presentation,
        ]);
    }

    public function update(Request $request, Course $course, Stage $stage, Lesson $lesson, LessonPresentation $presentation)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $presentation->update($request->all());

        if ($presentation->slides->count()) {
            foreach ($presentation->slides as $slide) {
                $slide->delete();
            }
        }

        if ($request->input('slide_images')) {
            foreach ($request->input('slide_images') as $key => $slideNum) {
                PresentationSlide::create([
                    'presentation_id' => $presentation->id,
                    'image' => $slideNum,
                    'slide_number' => $key+1,
                ]);
            }
        }

        return redirect()->route('courses.show', $course);
    }

    public function destroy(Course $course, Stage $stage, Lesson $lesson, LessonPresentation $presentation)
    {
        if ($presentation->slides->count())
        {
            foreach ($presentation->slides as $slide) {
                $slide->delete();
            }
        }
        $presentation->delete();

        return redirect()->route('courses.show', $course);
    }
}
