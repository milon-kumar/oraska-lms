@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">My Course</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">All Course Session STD C Id {{ stdCourseId() }}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($enroles as $enrole)
                                        <div class="col-md-3 mx-2  d-flex">
                                            <div href="{{ route('frontend.details',$enrole->course->slug ?? null) }}" class="card border border-secondary" style="border: 1px solid #d0d0d0" onclick="setStdCourseId({{ $enrole->course->id ?? '' }})">
                                                <div class="btn btn-success rounded-circle position-absolute d-flex justify-content-center align-content-center" style="width: 30px;height: 30px;{{ stdCourseId() == $enrole->course->id ? 'display: block!important;' : 'display: none!important;' }}">
                                                    <i class="mdi mdi-check-all"></i>
                                                </div>
                                                @if($enrole->course->image)
                                                    <div class="" style="width: 100%;height: 210px;">
                                                        <img style="width: 100%;height: 100%;" src="{{ asset($enrole->course->image) }}" alt="">
                                                    </div>
                                                @else
                                                    <img src="{{ asset(config('filesystems.noimage')) }}" alt="">
                                                @endif
                                                <div class="card-body">

                                                    <h4 class="fw-bold">{{ Str::limit($enrole->course->title,40) ?? '' }}</h4>
                                                    <small style="font-size: 15px;" class="text-success mb-1 d-block fw-bold">Running...&#10003;</small><br/>
                                                    <a class="mt-2" href="javascript:void(0)">
                                                        <del style="font-size: 18px;" class="text-danger fw-bolder">BDT{{$enrole->course->regular_course_fee}}</del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 18px;" class="fw-bolder text-primary">BDT {{ $enrole->course->full_course_fee }}</span>
                                                    </a>

                                                    <input type="hidden" value="{{ url('/details/'.$enrole->course->slug) }}" id="copyLink">
                                                    <a href="javascript:void(0);" onclick="copyLink()" class="mt-3 d-block btn btn-success btn-sm">Share Course  <i class="mdi mdi-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="col-md-4" onclick="setStdCourseId({{ $enrole->course->id }})">--}}
{{--                                            <div class="card border border-secondary shadow-sm">--}}
{{--                                                <img class="img-fluid card-img-top" src="{{ $enrole->course->image ? asset($enrole->course->image) : asset('images/default.jpg') }}" alt="">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <h4>{{ $enrole->course->title ?? '' }}</h4>--}}
{{--                                                    <p>{!! $enrole->course->courseDetails->course_description ?? '' !!}</p>--}}

{{--                                                    <a href="{{ route('student.course-details',$enrole->course->slug ?? '') }}" class="mt-3 d-block btn btn-success btn-sm">Details <i class="mdi mdi-check-all"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function setStdCourseId(id) {
            $.post('{{ route('set-student-course-id') }}' , {course_id:id} , function (response) {
                console.log(response);
                if (response.type == true){
                    alert('Your Course Is Selected')
                    $(`.selectTag-${id}`).css({"display":"inline-block"});
                }
            });
        }

        function copyLink() {
            const url = document.getElementById('copyLink').value;
            navigator.clipboard.writeText(url);
            alert("Shear Link Copid")
        }
    </script>
@endsection
