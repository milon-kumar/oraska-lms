<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeContoller extends Controller
{
    public function home()
    {
        $categories = Category::with(['publishedCourses'])->where('status',1)->get(['id','name','slug']);
        $available_course = Course::where('status',1)->latest()->take(6)->get(['id','slug','title']);
        $teachers = Teacher::where('status',1)->get();
        return view('frontend.pages.home.home',compact('categories','available_course','teachers'));
    }

    public function allInstructor()
    {
        $teachers = Teacher::where('status',1)->paginate(26);
        return view('frontend.pages.instructor.instructor',compact('teachers'));
    }
}
