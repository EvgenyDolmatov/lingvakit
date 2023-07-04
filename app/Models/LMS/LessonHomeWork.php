<?php

namespace App\Models\LMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonHomeWork extends Model
{
    use HasFactory;

    protected $table = 'lms_lesson_home_works';
    protected $fillable = ['lesson_id', 'file_path', 'comment'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function finishedTask()
    {
        return $this->hasOne(HomeWorkResult::class, 'homework_id');
    }

    public function getFile()
    {
        if ($this->file_path) {
            return '<a href="' . asset('uploads/' . $this->file_path) . '" alt target="_blank">Домашняя работа</a>';
        }
        return false;
    }
}
