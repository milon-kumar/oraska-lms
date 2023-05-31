@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <form action="{{ route('admin.course-details.store') }}" method="post" enctype="multipart/form-data" class="card">
                    @csrf
                    <div class="card-header">
                       <h4 class="d-inline-block">Course Setup</h4>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger float-end">Go Back</a>
{{--                        <a href="{{ route('admin.course-by-chapter',$course->id) }}" class="btn btn-success float-end">Add Class</a>--}}
{{--                        <a href="{{ route('admin.video.index') }}" class="btn btn-success float-end">Add Video</a>--}}
{{--                        <a href="{{ route('admin.course.show',$course->id) }}" class="btn btn-primary float-end">Add Exam</a>--}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'total_course_videos','placeholder'=>'টি' ,'value'=> 'Created By - '.auth()->user()->type, 'required'=>'required','readonly'=>'readonly'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','value'=> $course->title,'readonly'=>'readonly'])
                                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'courses_id','value'=> $course->id,'readonly'=>'readonly'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Upload Course Image (300 KB, 900x300 pixels max)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>"Upload Course Image"])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'total_course_students','required'=>'required','placeholder'=>'জন'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস ভিভিও সংখ্যা </label>
                                   @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'total_course_videos','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'total_class_hower','placeholder'=>'ঘণ্টা' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'mcq_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'weekly_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'peper_final_exams','placeholder'=>'টি' ,'required'=>'required'])
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ফেসবুক লাইভ ক্লাস কি হবে  </label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_facebook_live" class="form-check-input" id="class_facebook_live">
                                        <label class="form-check-label" for="class_facebook_live">Yes For Facebook Live</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_buy_video','required'=>'required'])
                                </div>

                                <div class="mb-3">
                                    <label for="projectname" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    @include('backend.admin.components.form_element.textarea',['name'=>'course_description','required'=>'required','rows'=>4,'placeholder'=>'Insert text 5000 characters max'])
                                </div>

                                <div class="mb-0">
                                    <label for="project-overview" class="form-label">Course Teacher</label>
                                    @include('backend.admin.components.form_element.select',['name'=>'teachers_id','data'=>\App\Models\Teacher::all()])
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-6">
                            <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Link</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','required'=>'required'])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Regular Course Fee</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','readonly'=>'readonly','value'=>$course->regular_course_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Discount</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','readonly'=>'readonly','value'=>$course->discount_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Full Course Fee (after Discount)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->category->name,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'enrollment_validity'])
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
