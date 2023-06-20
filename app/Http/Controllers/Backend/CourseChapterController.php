<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseChapterController extends Controller
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
        //
    }

    public function courseByChapter($id)
    {
        Session::forget('chapter_id');
        $chapters =  CourseChapter::with('videos')->where('course_id',courseId())->orderBy('created_at','DESC')->get();
        return view('backend.admin.pages.chapter.index',compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->name as $key => $value){
            $saveData = [
                'user_id'=>auth()->id(),
                'course_id'=>courseId(),
                'name'=>$request->name[$key],
                'slug'=>Str::slug($request->name[$key]),
                'serial'=>$request->serial[$key],
                'is_free'=>filled($request->is_free[$key] ?? null)
            ];
            DB::table('course_chapters')->insert($saveData);
        }



        toast('Chapter Created','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseChapter $courseChapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseChapter $courseChapter,$id)
    {
        $chapter = CourseChapter::with('course')->findOrFail($id);
        return view('backend.admin.pages.chapter.edit',compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseChapter $courseChapter,$id)
    {
        $chapter = CourseChapter::with('course')->findOrFail($id);

        $chapter->update([
            'user_id'=>auth()->id(),
            'course_id'=>courseId(),
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name')),
            'serial'=>$request->input('serial'),
            'is_free'=>filled($request->is_free?? null)
        ]);
        toast('Chapter Data Updated....... :)','success');
        return redirect()->route('admin.course-by-chapter',$chapter->course->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseChapter $courseChapter,$id)
    {

        $chapter =  CourseChapter::with(['course'])->findOrFail($id);
        $chapter->delete();
        toast('Chapter Deleted Successfully........','success');
        return redirect()->route('admin.course-by-chapter',$chapter->id);
    }

    public function chaptersDelete($id)
    {
        CourseChapter::findOrFail($id)->delete();
        toast('Chapter Deleted Successfully........','success');
        return redirect()->back();
    }

    public function setChapterId(Request $request)
    {
        if (Session::has('chapter_id')){
            Session::forget('chapter_id');
            Session::put('chapter_id',$request->input('chapter_id'));
            return response()->json([
                'type'=>true,
                'message'=>'Course Id Set success'
            ],200);
        }else{
            Session::put('chapter_id',$request->input('chapter_id'));
            return response()->json([
                'type'=>true,
                'message'=>'Course Id Set success'
            ],200);
        }
    }
}
