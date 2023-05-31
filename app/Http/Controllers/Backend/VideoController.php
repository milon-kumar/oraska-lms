<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function videoIndex($id)
    {
        $videos = Video::where('course_chapters_id',$id)->latest()->get();
        return view('backend.admin.pages.video.index',[
            'videos'=>$videos,
            'chapter_id'=>$id,
            'course_id'=>Session::get('course_id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->title as $key => $value){
            $saveData = [
                'users_id'=>auth()->id(),
                'courses_id'=>Session::get('course_id'),
                'course_chapters_id'=>$request->input('chapter_id'),
                'serial'=>$request->serial[$key],
                'duration'=>$request->duration[$key],
                'video_title'=>$request->title[$key],
                'slug'=>Str::slug($request->title[$key]),
                'video_link'=>$request->link[$key],
                'is_free'=>filled($request->is_free[$key] ?? null)
            ];
            DB::table('videos')->insert($saveData);
        }
        toast('Chapter Video Created....... :)','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {

        return view('backend.admin.pages.video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $video->update([
            'users_id'=>auth()->id(),
            'courses_id'=>Session::get('course_id'),
            'course_chapters_id'=>$video->course_chapters_id,
            'serial'=>$request->input('serial'),
            'duration'=>$request->input('duration'),
            'video_title'=>$request->input('video_title'),
            'slug'=>Str::slug($request->input('video_title')),
            'video_link'=>$request->input('video_link'),
            'is_free'=>filled($request->input('is_free') ?? null)
        ]);
        toast('Video Data Updated.......:)','success');


        return redirect()->route('admin.video-index',$video->course_chapters_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return
     */
    public function destroy($id)
    {
        $video =  Video::findOrFail($id);
        $video->delete();
        toast('Video Delete Successfully............','success');
        return redirect()->back();
    }
}
