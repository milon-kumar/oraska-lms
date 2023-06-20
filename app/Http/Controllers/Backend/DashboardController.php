<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\From;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        Session::forget('course_id');
        //$courses = Course::with(['category:id,name','videos','chapters'])->latest()->orderBy('id','DESC')->get();
        //$sliders = Slider::orderBy('serial','ASC')->get(['id','image','link','serial','is_read','is_buy']);
        return view('backend.admin.pages.dashboard.dashboard');
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

    public function ourTalk()
    {
        if (invalidPermission('Our_Talk')){
            return redirect()->back();
        }
        $title = 'About Message';
        return view('backend.admin.pages.about.index',compact('title'));
    }
}
