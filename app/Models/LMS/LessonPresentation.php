<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPresentation extends Model
{
    use HasFactory;

    protected $table = 'lms_lesson_presentation';
    protected $fillable = ['title', 'description', 'image'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'image');
    }

    public function mainImage()
    {
        return $this->belongsTo(MediaFile::class, 'image');
    }

    public function slides()
    {
        return $this->hasMany(PresentationSlide::class, 'presentation_id');
    }

    public static function add(array $input, $lesson)
    {
        $pres = new static();
        $pres->fill($input);
        $pres->lesson_id = $lesson->id;
        $pres->save();

        return $pres;
    }

    public function getImage(): string
    {
        return asset($this->mainImage->getSmallImage());
    }
}
