<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $guarded=['id'];

    public function courses()
    {
        return $this->hasMany(Course::class,'categories_id');
    }

    public function publishedCourses()
    {
        return $this->hasMany(Course::class,'categories_id')->where('status','published');
    }
}
