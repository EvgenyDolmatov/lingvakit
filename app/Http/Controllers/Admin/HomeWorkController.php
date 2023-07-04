<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\HomeWorkResult;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonHomeWork;
use App\Models\LMS\Stage;
use App\Models\LMS\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeWorkController extends Controller
{
    /**
     * Teacher's functions
     */
    public function create(Course $course, Stage $stage, Lesson $lesson)
    {
        return view('cms.courses.home-works.create', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson
        ]);
    }

    public function store(Request $request, Course $course, Stage $stage, Lesson $lesson)
    {
        $file = $request->file('home_work_file');

        if ($file == null) {
            $request->validate([
                'home_work_file' => 'required'
            ]);
        }

        $ext = $file->extension();
        $filename = 'homework-' . $lesson->id . '.' . $ext;
        $path = 'teachers/id_' . $course->author->id . '/home-works';
        $file->storeAs($path, $filename, 'uploads');

        LessonHomeWork::create([
            'lesson_id' => $lesson->id,
            'file_path' => $path . '/' . $filename,
            'comment' => $request->input('comment')
        ]);

        return redirect()->route('courses.show', $course);
    }

    public function edit(
        Course         $course,
        Stage          $stage,
        Lesson         $lesson,
        LessonHomeWork $homeWork
    )
    {
        return view('cms.courses.home-works.edit', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson,
            'homeWork' => $homeWork
        ]);
    }

    public function update(
        Request        $request,
        Course         $course,
        Stage          $stage,
        Lesson         $lesson,
        LessonHomeWork $homeWork
    )
    {
        $file = $request->file('home_work_file');

        if ($file) {
            $ext = $file->extension();
            $filename = 'homework-' . $lesson->id . '.' . $ext;
            $path = 'teachers/id_' . $course->author->id . '/home-works';
            $file->storeAs($path, $filename, 'uploads');
            Storage::disk('uploads')->delete($lesson->homeWork->file_path);

            $homeWork->file_path = $path . '/' . $filename;
        }
        $homeWork->comment = $request->input('comment');
        $homeWork->save();

        return redirect()->route('courses.show', $course);
    }

    public function homeWorksList()
    {
        $teacher = auth()->user();

        return view('cms.courses.home-works.show', [
            'homeWorks' => $teacher->uncheckedHomeWorks(),
            'allHomeWorks' => $teacher->allHomeWorks()->sortBy('check_date')
        ]);
    }

    public function changeAssessment(Request $request, HomeWorkResult $homeWorkResult)
    {
        $homeWorkResult->assessment = $request->input('assessment');
        $homeWorkResult->check_date = now();
        $homeWorkResult->save();
    }

    /**
     * Student's functions
     */
    public function storeHomeWork(Request $request, Course $course, Topic $topic)
    {
        $lesson = $topic->lesson;
        $student = auth()->user();
        $file = $request->file("student_file_path");

        if (!$file) {
            $request->validate([
                'student_file_path' => 'required'
            ]);
        }

        $ext = $file->extension();
        $filename = 'home-task-' . $lesson->id . '.' . $ext;
        $path = 'teachers/id_' . $course->author->id . '/home-works/students/student_' . $student->id;
        $file->storeAs($path, $filename, 'uploads');

        if ($lesson && $lesson->homeWork) {
            HomeWorkResult::create([
                'homework_id' => $lesson->homeWork->id,
                'student_id' => $student->id,
                'upload_date' => date('Y-m-d H:i:s'),
                'student_file_path' => $path . '/' . $filename,
                'student_comment' => $request->input('student_comment')
            ]);
        }

        return back()->with("upload_success", "Домашняя работа успешно загружена!");
    }
}
