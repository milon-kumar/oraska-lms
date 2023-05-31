<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\From;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        Session::forget('course_id');
        $courses = Course::with(['category:id,name','videos','chapters'])->latest()->orderBy('id','DESC')->where('status','published')->get();
        return view('backend.admin.pages.dashboard.dashboard',compact('courses'));
    }

    public function formSubmit(Request $request)
    {
        foreach ($request->name as $key => $value){
            From::create([
                'name'=>$value,
                'image'=>$request->hasFile('image') ? $request->image[$key]->store('/images/form', ['disk' =>'my_files']):'defalut.jpg',
            ]);
        }
        toast('Data Created','success');
        return redirect()->back();
    }

    public function setCourseId(Request $request)
    {
        if (Session::has('course_id')){
            Session::forget('course_id');
            Session::put('course_id',$request->input('course_id'));
            return response()->json([
                'type'=>true,
                'message'=>'Course Id Set success'
            ],200);
        }else{
            Session::put('course_id',$request->input('course_id'));
            return response()->json([
                'type'=>true,
                'message'=>'Course Id Set success'
            ],200);
        }
    }
}
