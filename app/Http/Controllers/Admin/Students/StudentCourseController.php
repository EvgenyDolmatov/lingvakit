<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\LMS\Conformity;
use App\Models\LMS\Course;
use App\Models\LMS\Quiz;
use App\Models\LMS\ResultAnswer;
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

    public function addCourse(User $student)
    {
        return view('cms.students.add-course', [
            'student' => $student,
            'courses' => Course::all(),
        ]);
    }

    public function giveAccessToCourse(User $student, Course $course)
    {
        $student->courses()->attach($course->id);
        return back();
    }

    public function downloadFile(ResultAnswer $file)
    {
        $path = public_path('/uploads/'.$file->value);
        return response()->download($path);
    }

    public function acceptQuestion(User $student, Quiz $quiz, Conformity $conformity)
    {
        $result = getResult($student, $quiz->topic);
        $resultAnswer = getUserAnswer($result, $conformity);
        $resultAnswer->update(['is_correct' => 1]);

        $resultPoints = $result->getOrCreatePoints($conformity->question); // Get Result Points
        $resultPoints->setPointsByTeacher($student, $conformity->question); // Set Result Points Quantity

        $totalScore = $quiz->topic->quiz->getTotalScore($student);

        $result->setTotalPoints();
        $result->updateStatus($totalScore);
        $quiz->topic->stage->course->updateProgress($student);

        return back();
    }
}
