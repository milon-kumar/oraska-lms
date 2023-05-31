<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $guarded=['id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }

    public function courseDetails()
    {
        return $this->hasOne(CourseDetails::class,'courses_id');
    }

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class,'courses_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class,'courses_id');
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class,'courses_id');
    }
}
