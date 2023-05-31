<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function showVideo($slug)
    {
        $video = Video::where('slug',$slug)->first();
        $viewKey = 'video_'.$video->id;
        if (!Session::has($viewKey)){
            $video->increment('view_count');
        }
        Session::put($viewKey,1);
        return view('backend.student.pages.course.show_video',compact('video'));
    }
}
