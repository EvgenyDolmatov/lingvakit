<?php

namespace App\Models\LMS;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentationSlide extends Model
{
    use HasFactory;

    protected $table = 'lms_presentation_slides';
    protected $fillable = ['presentation_id', 'image', 'slide_number'];

    public function presentation()
    {
        return $this->belongsTo(LessonPresentation::class, 'presentation_id');
    }

    public function slideImage()
    {
        return $this->belongsTo(MediaFile::class, 'image');
    }

    public function getImage(): string
    {
        return asset($this->slideImage->getSmallImage());
    }
}
