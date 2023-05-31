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
                        <h4 class="header-title d-inline">All Course <span class="badge badge-success-lighten">{{$courses->count()}}</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Course Title</th>
                                        <th>Class</th>
                                        <th>Class Video</th>
                                        <th>Total View</th>
                                        <th>Total Exam Held</th>
                                        <th>Asked Question</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $key => $course)
                                        <tr>
                                            <td>
                                                <div class="form-check mb-2">
                                                    <input type="radio" name="course_id" id="course-{{$course->id}}" onclick="setId({{ $course->id }})">
                                                    <label class="form-check-label" style="cursor: pointer;" for="course-{{$course->id}}">{{ optional($course)->title }}</label>
                                                </div>
                                            </td>
                                            <td>{{ $course->chapters->count() ?? 0 }}</td>
                                            <td>{{ $course->videos->count() ?? 0 }}</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>
                                                <a href="" class="btn btn-success btn-sm">Active</a>
                                                <a href="" class="btn btn-danger btn-sm">Disabeld</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin.course.create') }}">
                    <h4 class="text-center text-white bg-success p-2">Add New Course</h4>
                </a>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <a href="#" onclick="">
                    <h4 class="text-center text-white bg-danger p-2">Create Exam Dashboard</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href=" {{ route('admin.course-details.create') }} " @if(courseId())
                    style="pointer-events: none;"
                    @endif>
                    <h4 class="text-center text-white bg-primary p-2">Course Setup</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.course.edit-course') }}">
                    <h4 class="text-center text-white bg-info p-2">Edit Course Content</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-dark p-2">Course Exam Dashboard</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-success p-2">Replay Class Comments</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-warning p-2">Replay Class Comments</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-success p-2">Complain Box</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-danger p-2">Community Post</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-info p-2">Download Student Database</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.all-course') }}">
                    <h4 class="text-center text-white bg-dark p-2">Publish Course</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-info p-2">Change Course Fee</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.enrole.approve') }}">
                    <h4 class="text-center text-white bg-secondary p-2">Add Student Manually</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-success p-2">Generate Discount Card</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-primary p-2">View Free Exam Result</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.decline-course') }}">
                    <h4 class="text-center text-white bg-warning p-2">Disable Course</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <h4 class="text-center text-white bg-danger p-2">Delete Course</h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.setting.index') }}">
                    <h4 class="text-center text-white bg-dark p-2">Settings</h4>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function setId(id) {

            $.post('{{ route('set-course-id') }}' , {course_id:id} , function (response) {
                console.log(response);
            });

        }
    </script>
@endsection
