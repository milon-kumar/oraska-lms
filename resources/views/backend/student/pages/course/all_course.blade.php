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
                        <h4 class="header-title mb-3">All Course</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($user->allEnroles as $enrole)
                                        <div class="col-md-4">
                                            <div class="card border border-secondary shadow-sm">
                                                <img class="img-fluid card-img-top" src="{{ $enrole->course->image ? asset($enrole->course->image) : asset('images/default.jpg') }}" alt="">
                                                <div class="card-body">
                                                    <h4>{{ $enrole->course->title ?? '' }}</h4>
                                                    <p>{!! $enrole->course->courseDetails->course_description ?? '' !!}</p>
                                                    <a href="{{ route('student.course-details',$enrole->course->slug ?? '') }}" class="mt-3 d-block btn btn-success btn-sm">Details <i class="mdi mdi-arrow-expand"></i></a>
                                                </div>
                                            </div>
                                        </div>
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
