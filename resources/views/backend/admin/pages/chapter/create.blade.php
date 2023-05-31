@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" value="{{ date('Y-m-d') }}">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                       Add Class For  <strong><h4 class="header-title d-inline">{{ \App\Models\Course::findOrFail($course_id)->title }}</h4> </strong>Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.chapters.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Chapter Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Chapter name">
                                <input type="hidden" value="{{ $course_id }}" name="courses_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Sl Number</label>
                                <input type="number" name="order" class="form-control" placeholder="Order Number">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
@endsection
