<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Enrole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses()
    {
             $user =  User::with(['allEnroles','allEnroles.course','allEnroles.course.courseDetails','allEnroles.course.chapters','allEnroles.course.videos'])->findOrFail(auth()->id());
            return view('backend.student.pages.course.all_course',compact('user'));
    }

    public function courseDetails($slug)
    {
        $course = Course::with(['courseDetails','chapters','videos','chapters.videos'])->where('slug',$slug)->first();
        return view('backend.student.pages.course.course_details',compact('course'));
    }

    public function classVideo($slug)
    {
        $chapter = CourseChapter::with(['videos'])->where('slug',$slug)->first();
        return view('backend.student.pages.course.all_videos',compact('chapter'));
    }
}
