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
        return $this->belongsTo(Category::class);
    }

    public function courseDetails()
    {
        return $this->hasOne(CourseDetails::class);
    }

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class);
    }

    public function enrole()
    {
        return $this->belongsTo(Enrole::class);
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }

}
