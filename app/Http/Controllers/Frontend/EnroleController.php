<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrole;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnroleController extends Controller
{
    public function enrole($slug)
    {
        $course_id = Course::where('slug',$slug)->first()->id;
        return view('frontend.pages.enrole.enrole',compact('course_id'));
    }

    public function storeEnrole(Request $request)
    {
        $this->validate($request,[
            'user_name'=>'required|unique:users',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|confirmed',
            'method'=>'required',
            'number'=>['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'transition_id'=>'required',
            'date'=>'required',
            'name'=>'required|string|max:255',
            'phone'=>['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'others_phone'=>['regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'father_name'=>'required|string|max:255',
            'mother_name'=>'required|string|max:255',
            'thana'=>'required|string|max:255',
            'district'=>'required|string|max:255',
            'institute'=>'required|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,webp',
        ],[
            'number'=>'Your Phone Number Must 11 Deist',
            'phone'=>'Your Phone Number Must 11 Deist',
            'others_phone'=>'Your Phone Number Must 11 Deist',
        ]);

        $user = User::create([
            'type'=>'student',
            'ip_address'=>$request->ip(),
            'user_name'=>$request->input('user_name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'father_name'=>$request->input('father_name'),
            'mother_name'=>$request->input('mother_name'),
            'others_phone'=>$request->input('others_phone'),
            'institute'=>$request->input('institute'),
            'thana'=>$request->input('thana'),
            'district'=>$request->input('district'),
            'image'=>uploadImage($request),
        ]);

        $payment = Payment::create([
            'unique_id'=>'Or-P-'.date('s').rand(11111,99999),
            'users_id'=>$user->id,
            'course_id'=>$request->input('courses_id'),
            'method'=>$request->input('method'),
            'number'=>$request->input('number'),
            'transition_id'=>$request->input('transition_id'),
            'date'=>$request->input('date'),
            'status'=>'pending',
        ]);

        $enrole = Enrole::create([
            'unique_id'=>'Or-E-'.date('s').rand(11111,99999),
            'users_id'=>$user->id,
            'courses_id'=>$request->input('courses_id'),
            'payments_id'=>$payment->id,
            'status'=>'pending',
        ]);

        if ($user){
            Auth::login($user);
        }
        return redirect()->route('frontend.complete-enrole');
    }

    public function completeEnrole()
    {
        if (auth()->id()){
            $user = User::findOrFail(auth()->id());
            $enrole = Enrole::with(['course','payment'])->where('users_id',$user->id)->first();
            return view('frontend.pages.enrole.enrole_complete',compact('user','enrole'));
        }else{
            auth()->logout();
            toast('Access Denied','error');
            return redirect()->route('frontend.home');
        }
    }
}
