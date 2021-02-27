<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('is_staff', 0)->get();

        return view('cms.students.index', [
            'students' => $students
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
