<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Enrole;
use App\Models\Pdf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses()
    {
        $enroles  =  Enrole::with(['course'])->where('users_id',auth()->id())->where('status','approve')->get();
         //$user =  User::with(['allEnroles','allEnroles.course','allEnroles.course.courseDetails','allEnroles.course.chapters','allEnroles.course.videos'])->findOrFail(auth()->id());
        return view('backend.student.pages.course.all_course',compact('enroles'));
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

    public function buyCourse()
    {
        $courses = Course::where('status','published')->latest()->paginate(15);
        return view('backend.student.pages.course.buy_course',compact('courses'));
    }

    public function buyCourseDetails($slug)
    {
        return Course::with(['courseDetails'])->where('slug',$slug)->first();
    }

    public function chapter()
    {
        $chapters =  CourseChapter::with(['videos'])->where('courses_id',stdCourseId())->get();
        return view('backend.student.pages.course.chapters',compact('chapters'));
    }

    public function pdf($type = null)
    {
        $pdfs = Pdf::where('course_id',stdCourseId())->where('type',$type)->get();
        return view('backend.student.pages.course.pdf.all_pdf',compact('pdfs','type'));
    }

    public function pdfShow($id = null)
    {
        $pdf = Pdf::findOrFail($id);
        return view('backend.student.pages.course.pdf.show_pdf',compact('pdf'));
    }
}
