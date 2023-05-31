<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    use HasFactory;

    protected $table = "course_chapters";
    protected $guarded =['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class,'course_chapters_id');
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class,'course_chapters_id');
    }
}
