<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;
    protected $table="exam_types";
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class,'exam_types_id');
    }
}
