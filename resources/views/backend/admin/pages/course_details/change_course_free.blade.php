@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block">Change Course Free</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <form action="{{ route('admin.update-course-free') }}" method="post" enctype="multipart/form-data" class="card">
                    @csrf
                    <div class="card-header">
                        <h4 class="d-inline-block">Change course Free - ( {{ $course->title ?? '' }} )</h4>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger float-end">Go Back</a>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8 mx-auto border">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Regular Course Fee</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'regular_course_fee','value'=>$course->regular_course_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Discount</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','value'=>$course->discount_fee,])
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Full Course Fee (after Discount)</label>
                                    @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,])
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark float-end btn-lg">Update Course Free</button>
                    </div>
                </form> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
