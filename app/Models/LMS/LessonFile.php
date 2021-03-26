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

    public function getFileType($filename)
    {
        $ext = explode(".", $filename)[1];

        $word = ['doc', 'docx'];
        $excel = ['xls', 'xlsx'];
        $powerPoint = ['ppt', 'pptx'];
        $adobe = ['pdf'];
        $class = false;

        if (in_array($ext, $word)) {
            $class = 'word';
        }
        if (in_array($ext, $excel)) {
            $class = 'excel';
        }
        if (in_array($ext, $powerPoint)) {
            $class = 'power-point';
        }
        if (in_array($ext, $adobe)) {
            $class = 'adobe';
        }

        return $class;
    }
}
