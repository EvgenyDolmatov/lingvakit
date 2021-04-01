<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\LessonFile;
use App\Models\LMS\Stage;
use App\Models\LMS\Topic;
use App\Models\MediaFile;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Course $course, Stage $stage)
    {
        return view('cms.courses.lessons.create', [
            'course' => $course,
            'stage' => $stage,
        ]);
    }

    public function store(Request $request, Course $course, Stage $stage)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
        ]);

        $topic = Topic::create([
            'name' => 'lesson',
            'stage_id' => $stage->id
        ]);

        $lesson = Lesson::add($request->all(), $topic);

        $files = $request->input('files');
        if ($files) {
            foreach ($files as $file) {
                LessonFile::create([
                    'file_id' => $file,
                    'lesson_id' => $lesson->id
                ]);
            }
        }

        $course->updateDuration();

        return redirect()->route('courses.show', $course->id);
    }

    public function edit(Course $course, Stage $stage, Lesson $lesson)
    {
        return view('cms.courses.lessons.edit', [
            'course' => $course,
            'stage' => $stage,
            'lesson' => $lesson,
            'files' => LessonFile::where('lesson_id', $lesson->id)->get(),
        ]);
    }

    public function update(Request $request, Course $course, Stage $stage, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string',
            'duration' => 'required|numeric',
        ]);

        $lesson->update($request->all());

        $oldFiles = LessonFile::where('lesson_id', $lesson->id)->get();
        $files = $request->input('files');

        if ($files) {
            foreach ($files as $file) {
                LessonFile::create([
                    'file_id' => $file,
                    'lesson_id' => $lesson->id
                ]);
            }
            foreach ($oldFiles as $oldFile) {
                if (!in_array($oldFile->file_id, $files)) {
                    false;
                } else {
                    $oldFile->remove();
                }
            }
        }

        $course->updateDuration();

        return redirect()->route('courses.show', $course->id);
    }

    public function destroy(Course $course, Stage $stage, Lesson $lesson)
    {
        $lesson->remove();
        $course->updateDuration();

        return redirect()->route('courses.show', $course->id);
    }

    public function removeImage(Course $course, Stage $stage, Lesson $lesson)
    {
        $lesson->update(['image' => null]);
    }

    public function removeAudio(Course $course, Stage $stage, Lesson $lesson)
    {
        $lesson->update(['audio' => null]);
    }

    public function removeVideo(Course $course, Stage $stage, Lesson $lesson)
    {
        $lesson->update(['video' => null]);
    }

    public function removeFile(Course $course, Stage $stage, Lesson $lesson, LessonFile $file)
    {
        $file->delete();
    }
}
