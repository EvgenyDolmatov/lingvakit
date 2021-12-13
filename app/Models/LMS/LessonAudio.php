<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonAudio extends Model
{
    use HasFactory;

    protected $table = 'lms_lesson_audios';
    protected $fillable = ['audio', 'lesson_id'];

    public function question()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function audio()
    {
        return $this->hasOne(MediaFile::class, 'id', 'audio');
    }

    public function getAudio() : string
    {
        $audio = $this->audio()->first();

        if ($audio) {
            return $audio->getPath();
        }
        return false;
    }

    public function remove()
    {
        $this->delete();
    }
}
