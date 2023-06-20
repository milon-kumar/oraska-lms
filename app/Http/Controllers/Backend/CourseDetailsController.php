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
            return view('backend.admin.pages.course_details.edit',compact('course'));
        }else{
            return view('backend.admin.pages.course_details.create',compact('course'));
        }
    }

    public function changeCourseFree()
    {
        $course = Course::findOrFail(courseId());
        if ($course->courseDetails){
            return view('backend.admin.pages.course_details.change_course_free',compact('course'));
        }else{
            toast('Please Create Course Details First','warning');
            return redirect()->back();
        }
    }

    public function updateCourseFree(Request $request)
    {

        $course = Course::findOrFail(courseId());
        $data = $this->validate($request,[
           'regular_course_fee'=>'required|integer',
            'discount_fee'=>'required|integer',
        ]);
        $course->update([
            'regular_course_fee'=>$request->input('regular_course_fee'),
            'discount_fee'=>$request->input('discount_fee'),
            'full_course_fee'=>discournPrice($request),
        ]);
        toast('Course Fee updated Successfully.....','success');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'image'=>'required|image|mimes:jpg,png,jpeg,webp|max:300',
            'total_course_students'=>'required|integer',
            'recorded_class_video'=>'required|integer',
            'live_classes'=>'required|integer',
            'live_class_time'=>'required',
            'total_class_hours'=>'required|integer',
            'mcq_exams'=>'required|integer',
            'weekly_exams'=>'required|integer',
            'paper_final_exams'=>'required|integer',
            'course_buy_video'=>'required',
            'course_description'=>'string|max:5000|nullable',
            'fb_private_discussion_group'=>'required',
            'course_introduction_video'=>'required',
            'enrollment_validity'=>'required',
            'video_view_permit'=>'required|integer',
        ],[
            'image.required'=>'Image Must Be Required',
            'image.image'=>'Accept Only Image',
            'image.mimes'=>'Accept Image Type Only jpg,png,jpeg,webp',
            'image.max'=>'Maximum Image Size 300kb',
            'total_course_students.required'=>'Total Course Students Default Required',
            'total_course_students.integer'=>'Total Course Students Accept Integer Values',
            'recorded_class_video.required'=>'Recorded Class Video Default Required',
            'recorded_class_video.integer'=>'Recorded Class Video Accept Integer Values',
            'live_classes.required'=>'Live Classes Default  Required',
            'live_classes.integer'=>'Live Classes Accept Integer Values',
            'live_class_time.required'=>'Live Class Time Default  Required',
            'total_class_hours.required'=>'Total Class Hours Default  Required',
            'total_class_hours.integer'=>'Total Class Hours Accept Integer Values',
            'paper_final_exams.required'=>'Paper Final Exams Default  Required',
            'paper_final_exams.integer'=>'Paper Final Exams Accept Integer Values',
            'course_buy_video.required'=>'Course Buy Video Link Required',
            'fb_private_discussion_group.required'=>"Facebook Private Discussion Group Link Required",
            'course_introduction_video.required'=>'Course Introduction Video Tag Required',
            'enrollment_validity.required'=>'Enrollment Validity Required',
            'video_view_permit.required'=>'Video View Permit Value Required',
            'video_view_permit.integer'=>'Video View Permit Accept Integer Value',
        ]);

        CourseDetails::create([
            'user_id'=>Auth::id(),
            'course_id'=>$request->input('courses_id'),
            'image'=>uploadImage($request),
            'total_course_students'=>$request->input('total_course_students'),
            'recorded_class_video'=>$request->input('recorded_class_video'),
            'live_classes'=>$request->input('live_classes'),
            'live_class_time'=>$request->input('live_class_time'),
            'total_class_hours'=>$request->input('total_class_hours'),
            'mcq_exams'=>$request->input('mcq_exams'),
            'weekly_exams'=>$request->input('weekly_exams'),
            'paper_final_exams'=>$request->input('paper_final_exams'),
            'class_recorded'=>$request->filled('class_recorded'),
            'live_class_method'=>$request->input('live_class_method'),
            'course_buy_video'=>$request->input('course_buy_video'),
            'course_description'=>$request->input('course_description'),
            'teachers'=>json_encode($request->input('teachers')),
            'fb_private_discussion_group'=>$request->input('fb_private_discussion_group'),
            'course_introduction_video'=>$request->input('course_introduction_video'),
            'enrollment_validity'=>$request->input('enrollment_validity'),
            'video_view_permit'=>$request->input('video_view_permit'),
        ]);
        toast('Course Details Created','success');
        return redirect()->route('admin.dashboard');
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

        $this->validate($request,[
            'image'=>'image|mimes:jpg,png,jpeg,webp|max:300',
            'total_course_students'=>'required|integer',
            'recorded_class_video'=>'required|integer',
            'live_classes'=>'required|integer',
            'live_class_time'=>'required',
            'total_class_hours'=>'required|integer',
            'mcq_exams'=>'required|integer',
            'weekly_exams'=>'required|integer',
            'paper_final_exams'=>'required|integer',
            'course_buy_video'=>'required',
            'course_description'=>'string|max:5000|nullable',
            'fb_private_discussion_group'=>'required',
            'course_introduction_video'=>'required',
            'enrollment_validity'=>'required',
            'video_view_permit'=>'required|integer',
        ],[
            'image.image'=>'Accept Only Image',
            'image.mimes'=>'Accept Image Type Only jpg,png,jpeg,webp',
            'image.max'=>'Maximum Image Size 300kb',
            'total_course_students.required'=>'Total Course Students Default Required',
            'total_course_students.integer'=>'Total Course Students Accept Integer Values',
            'recorded_class_video.required'=>'Recorded Class Video Default Required',
            'recorded_class_video.integer'=>'Recorded Class Video Accept Integer Values',
            'live_classes.required'=>'Live Classes Default  Required',
            'live_classes.integer'=>'Live Classes Accept Integer Values',
            'live_class_time.required'=>'Live Class Time Default  Required',
            'total_class_hours.required'=>'Total Class Hours Default  Required',
            'total_class_hours.integer'=>'Total Class Hours Accept Integer Values',
            'paper_final_exams.required'=>'Paper Final Exams Default  Required',
            'paper_final_exams.integer'=>'Paper Final Exams Accept Integer Values',
            'course_buy_video.required'=>'Course Buy Video Link Required',
            'fb_private_discussion_group.required'=>"Facebook Private Discussion Group Link Required",
            'course_introduction_video.required'=>'Course Introduction Video Tag Required',
            'enrollment_validity.required'=>'Enrollment Validity Required',
            'video_view_permit.required'=>'Video View Permit Value Required',
            'video_view_permit.integer'=>'Video View Permit Accept Integer Value',
        ]);

        $courseDetails =  CourseDetails::findOrFail($id);
        $courseDetails->update([
            'user_id'=>Auth::id(),
            'course_id'=>$request->input('courses_id'),
            'image'=>uploadImage($request,$courseDetails),
            'total_course_students'=>$request->input('total_course_students'),
            'recorded_class_video'=>$request->input('recorded_class_video'),
            'live_classes'=>$request->input('live_classes'),
            'live_class_time'=>$request->input('live_class_time'),
            'total_class_hours'=>$request->input('total_class_hours'),
            'mcq_exams'=>$request->input('mcq_exams'),
            'weekly_exams'=>$request->input('weekly_exams'),
            'paper_final_exams'=>$request->input('paper_final_exams'),
            'class_recorded'=>$request->filled('class_recorded'),
            'live_class_method'=>$request->input('live_class_method'),
            'course_buy_video'=>$request->input('course_buy_video'),
            'course_description'=>$request->input('course_description'),
            'teachers'=>json_encode($request->input('teachers')),
            'fb_private_discussion_group'=>$request->input('fb_private_discussion_group'),
            'course_introduction_video'=>$request->input('course_introduction_video'),
            'enrollment_validity'=>$request->input('enrollment_validity'),
            'video_view_permit'=>$request->input('video_view_permit'),
        ]);



        $category = Course::findOrFail($request->input('courses_id'));
        $category->update([
            'category_id'=>$request->input('categories_id'),
            'title'=>$request->input('title'),
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
