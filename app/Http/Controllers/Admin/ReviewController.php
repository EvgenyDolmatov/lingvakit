<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\CourseReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('cms.reviews.reviews', [
            'reviews' => CourseReview::all()
        ]);
    }

    public function ban(CourseReview $review)
    {
        if ($review->is_active) {
            $review->update([ 'is_active' => 0 ]);
        } else {
            $review->update([ 'is_active' => 1 ]);
        }

        return back();
    }

    public function destroy(CourseReview $review)
    {
        $review->delete();
        return back();
    }
}
