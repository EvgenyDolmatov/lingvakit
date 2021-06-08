<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use App\Models\FeedbackMessage;
use App\Models\LMS\Course;
use App\Models\LMS\Language;
use App\Models\LMS\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::where([
            ['is_published', 1],
            ['is_allowed', 1],
        ]);

        if ($request->has('language')) {
            $courses->where('language_id', $request->language);
        }

        return view('welcome', [
            'courses' => $courses->get(),
            'languages' => Language::all(),
        ]);
    }

    public function contacts()
    {
        return view('site.contacts');
    }

    public function aboutUs()
    {
        return view('site.about-us');
    }

    public function privacyPolicy()
    {
        return view('site.privacy-policy');
    }

    public function offerAgreement()
    {
        return view('site.offer-agreement');
    }

    public function myCourses()
    {
        return view('site.my-courses', [
            'courses' => Auth::user()->courses
        ]);
    }

    public function getCourse(Course $course)
    {
        if ($course->type === 'free') {
            $course->students()->attach(Auth::user()->id);
        }

        return back();
    }

    public function showCourse(Course $course)
    {
        $user = Auth::user();

        if ($user) {
            Result::where([
                ['user_id', $user->id],
                ['topic_id', $user->id],
            ])->first();
        }

        return view('site.course.show', [
            'course' => $course,
            'user' => $user,
        ]);
    }

    public function feedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        $feedback = FeedbackMessage::add($request->all());

        if ($feedback) {
            Mail::to('pristya@bk.ru')->send(new Feedback($feedback));
        }

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}
