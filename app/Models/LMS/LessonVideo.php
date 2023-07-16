<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonVideo extends Model
{
    use HasFactory;

    protected $table = 'lms_lesson_videos';
    protected $fillable = ['lesson_id', 'video', 'poster'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function getVideoPath()
    {
        return MediaFile::find($this->video)->getPath();
    }

    public function getPosterPath()
    {
        return MediaFile::find($this->poster)->getPath();
    }
}
