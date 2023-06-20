<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterExam extends Model
{
    use HasFactory;

    protected $table="chapter_exams";
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(CourseChapter::class);
    }

    public function examTypes()
    {
        return $this->belongsTo(ExamType::class);
    }
}
