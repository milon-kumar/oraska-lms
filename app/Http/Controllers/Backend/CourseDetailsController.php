<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CourseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::with(['category','courseDetails'])->findOrFail(courseId());

        if ($course->courseDetails){
            return view('backend.admin.pages.course_details.edit',compact('course'));
        }else{
            return view('backend.admin.pages.course_details.create',compact('course'));
        }
    }

    public function createByCourse($id)
    {
        $course = Course::with(['category','courseDetails'])->findOrFail($id);

        if ($course->courseDetails){
            return view('backend.admin.pages.course_details.create',compact('course'));
        }else{
            return view('backend.admin.pages.course_details.create',compact('course'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'teachers_id'=>'required|integer',
            'image'=>'required|image|mimes:jpg,png,jpeg,webp',
            'total_course_students'=>'required|integer',
            'total_course_videos'=>'required|integer',
            'total_class_hower'=>'required|integer',
            'mcq_exams'=>'required|integer',
            'weekly_exams'=>'required|integer',
            'peper_final_exams'=>'required|integer',
            'course_buy_video'=>'required',
            'course_description'=>'string|max:5000|nullable',
            'course_introduction_video'=>'required',
            'enrollment_validity'=>'required',
        ]);

        CourseDetails::create([
            'users_id'=>Auth::id(),
            'courses_id'=>$request->input('courses_id'),
            'teachers_id'=>$request->input('teachers_id'),
            'image'=>uploadImage($request),
            'total_course_students'=>$request->input('total_course_videos'),
            'total_course_videos'=>$request->input('total_course_videos'),
            'total_class_hower'=>$request->input('total_class_hower'),
            'mcq_exams'=>$request->input('mcq_exams'),
            'weekly_exams'=>$request->input('weekly_exams'),
            'peper_final_exams'=>$request->input('peper_final_exams'),
            'class_recorded'=>$request->filled('class_recorded'),
            'class_facebook_live'=>$request->filled('class_facebook_live'),
            'course_buy_video'=>$request->input('course_buy_video'),
            'course_description'=>$request->input('course_description'),
            'course_introduction_video'=>$request->input('course_introduction_video'),
            'enrollment_validity'=>$request->input('enrollment_validity'),
        ]);
        toast('Course Details Created','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseDetails $courseDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return CourseDetails::find("course_id", $id);
        return dd($id);
        return URL::route('admin.course.create');
        return view('backend.admin.pages.course_details.edit',compact('courseDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $courseDetails =  CourseDetails::findOrFail($id);
        $courseDetails->update([
            'courses_id'=>$request->input('courses_id'),
            'teachers_id'=>$request->input('teachers_id'),
            'image'=>uploadImage($request,$courseDetails),
            'total_course_students'=>$request->input('total_course_students'),
            'total_course_videos'=>$request->input('total_course_videos'),
            'total_class_hower'=>$request->input('total_class_hower'),
            'mcq_exams'=>$request->input('mcq_exams'),
            'weekly_exams'=>$request->input('weekly_exams'),
            'peper_final_exams'=>$request->input('peper_final_exams'),
            'class_recorded'=>$request->filled('class_recorded'),
            'class_facebook_live'=>$request->filled('class_facebook_live'),
            'course_buy_video'=>$request->input('course_buy_video'),
            'course_description'=>$request->input('course_description'),
            'course_introduction_video'=>$request->input('course_introduction_video'),
            'enrollment_validity'=>$request->input('enrollment_validity'),
        ]);

        Course::findOrFail($request->input('courses_id'))->update([
            'categories_id'=>$request->input('categories_id'),
            'title'=>$request->input('title'),
            'regular_course_fee'=>$request->input('regular_course_fee'),
            'discount_fee'=>$request->input('discount_fee') ?? 0,
            'full_course_fee'=>discournPrice($request),
        ]);

        toast('Course Details Updated ... :)','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseDetails $courseDetails)
    {
        //
    }
}
