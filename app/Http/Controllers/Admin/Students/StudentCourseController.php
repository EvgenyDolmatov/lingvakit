<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function studentsList(Course $course)
    {
        $studentsByCourse = $course->students;

        $tempStudents = array();
        $students = array();

        foreach ($studentsByCourse as $student) {
            if (!$student->is_staff) {
                $tempStudents[$student->getPoints($course)] = $student->id;
            }
        }

        krsort($tempStudents);
        foreach ($tempStudents as $id) {
            $students[] = User::find($id);
        }

        return view('cms.students.course.list', [
            'course' => $course,
            'students' => $students,
        ]);
    }

    public function show(User $student, Course $course)
    {
        return view('cms.students.course.show', [
            'student' => $student,
            'course' => $course,
        ]);
    }

    public function showAnswers(User $student, Course $course, Quiz $quiz)
    {
        return view('cms.students.course.quiz-answers', [
            'student' => $student,
            'course' => $course,
            'quiz' => $quiz,
            'result' => getResult($student, $quiz->topic)
        ]);
    }
}
