<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            return $user->is_staff;
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
        return view('cms.students.show', [
            'student' => $student
        ]);
    }

    public function edit(User $student)
    {
        return view('cms.students.show', [
            'student' => $student
        ]);
    }
}
