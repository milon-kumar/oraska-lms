<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['category:id,name'])->latest()->orderBy('id','desc')->get();
        return view('backend.admin.pages.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::where('status',1)->get(['id','name']);
        return view('backend.admin.pages.course.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'categories_id'=>'required|integer',
            'regular_course_fee'=>'required|integer',
        ]);


        Course::create([
            'title'=>$request->input('title'),
            'categories_id'=>$request->input('categories_id'),
            'slug'=>Str::slug($request->input('title')),
            'image'=>uploadImage($request),
            'regular_course_fee'=>$request->input('regular_course_fee'),
            'discount_fee'=>$request->input('discount_fee') ?? 0 ,
            'full_course_fee'=>discournPrice($request),
            'status'=>'pending',
        ]);
        toast('Course Create Successfully ... :)','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('backend.admin.pages.course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories =  Category::where('status',1)->get(['id','name']);
        return view('backend.admin.pages.course.edit',compact('categories','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $this->validate($request,[
            'title'=>'required',
            'categories_id'=>'required|integer',
            'regular_course_fee'=>'required|integer',
        ]);


        $course->update([
            'title'=>$request->input('title'),
            'categories_id'=>$request->input('categories_id'),
            'slug'=>Str::slug($request->input('title')),
            'image'=>uploadImage($request,$course),
            'regular_course_fee'=>$request->input('regular_course_fee'),
            'discount_fee'=>$request->input('discount_fee') ?? 0 ,
            'full_course_fee'=>($request->input('regular_course_fee')) - ($request->input('discount_fee') ?? 0),
            'status'=>0,
        ]);
        toast('Course Updated Successfully ... :)','success');
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        @unlink($course->image);
        $course->delete();
        toast('Course Deleted Successfully ... :)','success');
        return redirect()->route('admin.course.index');
    }

    public function editCourse(){
        return view('backend.admin.pages.course.edit_content');
    }

    public function allCourse()
    {
        $courses =  Course::with(['category'])->get();
        return view('backend.admin.pages.course.all_course',compact('courses'));
    }

    public function pendingCourse()
    {
        $courses =  Course::with(['category'])->where('status','pending')->get();
        return view('backend.admin.pages.course.pending_course',compact('courses'));
    }
    public function publishedCourse()
    {
        $courses =  Course::with(['category'])->where('status','published')->get();
        return view('backend.admin.pages.course.published_course',compact('courses'));
    }
    public function unpublishedCourse()
    {
        $courses =  Course::with(['category'])->where('status','unpublished')->get();
        return view('backend.admin.pages.course.unpublished_course',compact('courses'));
    }
    public function declineCourse()
    {
        $courses =  Course::with(['category'])->where('status','decline')->get();
        return view('backend.admin.pages.course.decline_course',compact('courses'));
    }
    public function changeStatus($id)
    {
        $course =  Course::findOrFail($id);
        return view('backend.admin.pages.course.change_status',compact('course'));
    }
    public function makePublished(Request $request)
    {
        $course =  Course::findOrFail($request->input('course_id'));
        $course->status = $request->input('status');
        $course->save();
        toast('Course Published......:)','success');
        return redirect()->route('admin.all-course');
    }

    public function mainSectionCourse()
    {
        $courses = Course::with('category')->get();
        return view('backend.admin.pages.course.main.index',compact('courses'));
    }

//    public function viewDetails($id)
//    {
//        if (Session::has('course_id')){
//            Session::forget('course_id');
//            Session::put('course_id',$id);
//        }else{
//            Session::put('course_id',$id);
//        }
//        $course = Course::with(['courseDetails','chapters','chapters.videos'])->findOrFail($id);
//        return view('backend.admin.pages.course.main.show',compact('course'));
//    }
    //.................................................................................................................//
    public function mainAllCourse()
    {
        $courses = Course::with(['category'])->latest()->get();
        return view('backend.admin.pages.main.course.index',compact('courses'));
    }

    public function mainCourseShow($slug)
    {
        return Course::where('slug',$slug)->first();
    }
}
