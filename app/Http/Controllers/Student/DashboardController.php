<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->id()){
            $user = User::findOrFail(auth()->id());
            $enrole = Enrole::with(['course','payment','course.chapters','course.videos'])->where('users_id',$user->id)->first();

            if($enrole->status == 'approve'){
                return view('backend.student.pages.dashboard.dashboard',compact('user','enrole'));
            }elseif ($enrole->status){
                toast('Your Course '.Str::upper($enrole->status).' Now........','warning');
                return view('frontend.pages.enrole.enrole_complete',compact('user','enrole'));
            }else{
                auth()->logout();
                toast('Access Denied ffffffffff');
                return redirect()->route('frontend.home');
            }
        }else{
            auth()->logout();
            toast('Access Denied ggggggggggg','error');
            return redirect()->route('frontend.home');
        }

    }
}
