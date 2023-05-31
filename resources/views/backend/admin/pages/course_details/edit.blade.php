@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <form action="{{ route('admin.course-details.update',$course->courseDetails->id) }}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <h4 class="d-inline-block">Course Setup</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-danger float-end">Go Back</a>
                        <a href="{{ route('admin.course-by-chapter',$course->id) }}" class="btn btn-success float-end">Classes</a>
                        <a href="{{ route('admin.course.show',$course->id) }}" class="btn btn-primary float-end">Exams</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <input type="text" value="Course Setup By {{ auth()->user()->type }}" readonly id="projectname" class="form-control" placeholder="Enter project name">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    <input type="text" value="{{ $course->title }}" name="title" id="projectname" class="form-control" placeholder="Enter project name">
                                    <input type="hidden" value="{{ $course->id }}" name="courses_id" id="projectname" class="form-control" placeholder="Enter project name">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Upload Course Image (300 KB, 900x300 pixels max)</label>
                                    <input type="file" name="image" id="projectname" class="form-control dropify" data-default-file="{{ asset($course->courseDetails->image) }}" placeholder="Upload Course Image">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    <input type="number" value="{{ $course->courseDetails->total_course_students  }}" name="total_course_students" id="projectname" class="form-control" placeholder=" জন">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস ভিভিও সংখ্যা </label>
                                    <input type="number"  value="{{ $course->courseDetails->total_course_videos  }}" name="total_course_videos" id="projectname" class="form-control" placeholder=" টি">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    <input type="number"  value="{{ $course->courseDetails->total_class_hower  }}"  name="total_class_hower" id="projectname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    <input type="number" value="{{ $course->courseDetails->mcq_exams  }}" name="mcq_exams" id="projectname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    <input type="number" value="{{ $course->courseDetails->weekly_exams  }}" name="weekly_exams" id="projectname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    <input type="number" value="{{ $course->courseDetails->peper_final_exams  }}" name="peper_final_exams" id="projectname" class="form-control">
                                </div>
                                {{--                                <div class="mb-3">--}}
                                {{--                                    <label for="projectname" class="form-label"> কোর্স শিক্ষক এর নাম ও বর্ণনা </label>--}}
                                {{--                                    --}}
                                {{--                                    <input type="text" value="{{ $course->title }}" readonly id="projectname" class="form-control" placeholder=" টি">--}}
                                {{--                                </div>--}}
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" {{ $course->courseDetails->class_recorded == 1 ? 'checked' : '' }} name="class_recorded" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ফেসবুক লাইভ ক্লাস কি হবে  </label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" {{ $course->courseDetails->class_facebook_live == 1 ? 'checked' : '' }} name="class_facebook_live" class="form-check-input" id="class_facebook_live">
                                        <label class="form-check-label" for="class_facebook_live">Yes For Facebook Live</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    <input type="text" name="course_buy_video" value="{{ $course->courseDetails->course_buy_video }}" id="projectname" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="projectname" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    <textarea name="course_description" id="" class="form-control" rows="5">{!! $course->courseDetails->course_description !!}</textarea>
                                </div>

                                <div class="mb-0">
                                    <label for="project-overview" class="form-label">Course Teacher</label>
                                    <select name="teachers_id" class="form-control select2" data-toggle="select2">
                                        <option>Select</option>
                                        @foreach(\App\Models\Teacher::all() as $teacher)
                                            <option {{ $teacher->id == $course->courseDetails->teachers_id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div> <!-- end col-->

                            <div class="col-xl-6">
                                <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Link</label>
                                    <input name="course_introduction_video" value="{{ $course->courseDetails->course_introduction_video }}" type="text" class="form-control">
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Regular Course Fee</label>
                                    <input type="text" name="regular_course_fee" value="{{ $course->regular_course_fee }}" required class="form-control">
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Discount</label>
                                    <input type="text" name="discount_fee" value="{{ $course->discount_fee }}" class="form-control">
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Full Course Fee (after Discount)</label>
                                    <input type="text" name="full_course_fee" value="{{ $course->full_course_fee }}" readonly class="form-control">
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    <select name="categories_id" class="form-control select2" data-toggle="select2">
                                        <option>Select</option>
                                        @foreach(\App\Models\Category::where('status',1)->get() as $category)
                                            <option {{ $category->id == $course->categories_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    <input type="text" value="{{ $course->courseDetails->enrollment_validity}}" name="enrollment_validity" class="form-control">
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
