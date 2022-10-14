<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LMS\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {

        $currentUser = Auth::user();
        $courses = Course::where('author_id', $currentUser->id)->get();

        $myStudentsIds = array();

        foreach ($courses as $course) {
            foreach ($course->students as $student) {
                $myStudentsIds[] = $student->id;
            }
        }
        $myStudentsIds = array_unique($myStudentsIds);

        $students = User::all()->reject(function ($user) {
            return $user->hasRole(['teacher', 'admin', 'superuser']);
        })->map(function ($user) {
            return $user;
        });

        $myStudents = $students->only($myStudentsIds);

        return view('cms.students.index', [
            'students' => $myStudents
        ]);
    }

    public function show(User $student)
    {
        $studentCourses = $student->courses;

        $courses = $studentCourses->reject(function ($course) {
            return $course->author->id !== Auth::user()->id;
        })->map(function ($course) {
            return $course;
        });

        return view('cms.students.show', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }

    public function edit(User $student)
    {
        return view('cms.students.edit', [
            'student' => $student,
            'groups' => Group::all()
        ]);
    }

    public function update(Request $request, User $student)
    {
        return redirect()->route('students.index');
    }

    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
