<?php

namespace App\Models\LMS;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lms_stages';

    protected $fillable = ['name', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id', 'lms_courses');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }


    public static function add($fields, $course)
    {
        $stage = new static();
        $stage->fill($fields);
        $stage->course_id = $course->id;
        $stage->save();

        return $stage;
    }
}
