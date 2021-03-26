<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonFile extends Model
{
    use HasFactory;

    protected $table = 'lms_lesson_files';
    protected $fillable = ['file_id', 'lesson_id'];

    public function question()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function document()
    {
        return $this->hasOne(MediaFile::class, 'id', 'file_id');
    }

    public function fileId()
    {
        return $this->hasOne(MediaFile::class, 'id', 'file_id');
    }

    public function getFile() : string
    {
        $file = $this->fileId()->first();

        if ($file) {
            return $file->getPath();
        }
        return false;
    }

    public function remove()
    {
        $this->delete();
    }
}
