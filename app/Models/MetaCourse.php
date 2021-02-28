<?php

namespace App\Models;

use App\Models\LMS\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaCourse extends Model
{
    use HasFactory;

    public $fillable = ['course_id', 'title', 'keywords', 'description'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function add($request, $course)
    {
        $meta = new static();
        $meta->course_id = $course->id;
        $meta->title = $request->meta_title;
        $meta->description = $request->meta_description;
        $meta->keywords = $request->meta_keywords;
        $meta->save();
    }
}
