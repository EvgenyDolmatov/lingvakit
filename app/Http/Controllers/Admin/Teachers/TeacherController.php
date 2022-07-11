<?php

namespace App\Http\Controllers\Admin\Teachers;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Role::where('name', 'teacher')->first()->users()->get();

        return view('cms.teachers.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(User $teacher)
    {
        $courses = Course::where('author_id', $teacher->id)->get();

        return view('cms.teachers.show', [
            'teacher' => $teacher,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function coursesForModeration()
    {
        $courses = Course::all()->reject(function ($course) {
            return $course->is_allowed === 1;
        })->reject(function ($course) {
            return $course->author->is_active === 0;
        })->map(function ($course) {
            return $course;
        });

        return view('cms.teachers.courses.moderation', [
            'courses' => $courses
        ]);
    }

    public function courseModerateSwitcher(Course $course)
    {
        if ($course->is_allowed) {
            $course->update(['is_allowed' => 0]);
        } else {
            $course->update(['is_allowed' => 1]);
        }

        return back();
    }
}
