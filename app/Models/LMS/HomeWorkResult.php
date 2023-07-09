<?php

namespace App\Models\LMS;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWorkResult extends Model
{
    use HasFactory;

    protected $table = 'lms_home_work_results';
    protected $fillable = [
        'homework_id',
        'student_id',
        'student_comment',
        'assessment',
        'upload_date',
        'check_date',
        'student_file_path',
        'teacher_comment'
    ];

    public function homeWork()
    {
        return $this->belongsTo(LessonHomeWork::class, 'homework_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function getAssessment()
    {
        if ($this->assessment) {
            return $this->assessment;
        }
        return 'Не проверено';
    }

    public function isChecked(): bool
    {
        return (bool)$this->check_date;
    }
}
