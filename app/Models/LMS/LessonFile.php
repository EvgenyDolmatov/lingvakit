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

    public function getFileType($filename) : string
    {
        $ext = explode(".", $filename)[1];

        switch ($ext) {
            case in_array($ext, ['doc', 'docx']):
                $class = 'word';
                break;
            case in_array($ext, ['xls', 'xlsx']):
                $class = 'excel';
                break;
            case in_array($ext, ['ppt', 'pptx']):
                $class = 'power-point';
                break;
            case in_array($ext, ['pdf']):
                $class = 'adobe';
                break;
            default:
                $class = 'other-file';
                break;
        }
        return $class;
    }
}
