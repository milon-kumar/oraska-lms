
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header text-white bg-dark">
                <h3 class="header-title d-inline">Admin Tools</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @can('Course.Create')
                        <div class="col-md-3">
                            <a href="{{ route('admin.course.create') }}">
                                <h4 class="text-center text-white bg-success p-2">Add New Course</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Copy')
                        <div class="col-md-3">
                            <a href="{{ route('admin.course-copy') }}">
                                <h4 class="text-center text-white bg-success p-2">Full Course Copy & Paste</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Book.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}">
                                <h4 class="text-center text-white bg-warning p-2"> Add / Edit Book Shop</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Exam.Dashboard')
                        <div class="col-md-3">
                            <a href="#" onclick="">
                                <h4 class="text-center text-white bg-danger p-2">Create Exam Dashboard</h4>
                            </a>
                        </div>
                    @endcan
                    @can('CourseDetails.Create')
                        <div class="col-md-3">
                            <a href=" {{ route('admin.course-details.create') }} " @if(courseId())
                            style="pointer-events: none;"
                                @endif>
                                <h4 class="text-center text-white bg-primary p-2">Course Setup</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Edit_Content')
                        <div class="col-md-3">
                            <a href="{{ route('admin.course.edit-course') }}">
                                <h4 class="text-center text-white bg-info p-2">Edit Course Content</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Show')
                        <div class="col-md-3">
                            <a href="{{ route('admin.course.preview-course') }}">
                                <h4 class="text-center text-white bg-info p-2">Preview Course</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Class.Attendance')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-dark p-2">Class Attendance Dashboard</h4>
                            </a>
                        </div>
                    @endcan

                    @can('Exam.Dashboard')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-dark p-2">Course Exam Dashboard</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Comment.List')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-success p-2">Replay Class Comments</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Complain.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.complain.index') }}">
                                <h4 class="text-center text-white bg-success p-2">Complain Box</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Student.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.complain.index') }}">
                                <h4 class="text-center text-white bg-success p-2">Transfer Student</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Post.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.post.index') }}">
                                <h4 class="text-center text-white bg-danger p-2">Community Post</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Student.Dashboard_Download')
                        <div class="col-md-3">
                            <a href="{{ route('admin.student.index') }}">
                                <h4 class="text-center text-white bg-info p-2">Download Student Database</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Status')
                        <div class="col-md-3">
                            <a href="{{ route('admin.all-course') }}">
                                <h4 class="text-center text-white bg-dark p-2">Publish Course</h4>
                            </a>
                        </div>
                    @endcan
                    @can('CourseDetails.Edit')
                        <div class="col-md-3">
                            <a href="{{ route('admin.change-course-free') }}">
                                <h4 class="text-center text-white bg-info p-2">Change Course Fee</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Enroll.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.enrole.approve') }}">
                                <h4 class="text-center text-white bg-secondary p-2">Add Student Manually</h4>
                            </a>
                        </div>
                    @endcan
                    @can('CourseDetails.Edit')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-success p-2">Generate Discount Card</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Exam.Free_Result')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-primary p-2">View Free Exam Result</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Status')
                        <div class="col-md-3">
                            <a href="{{ route('admin.decline-course') }}">
                                <h4 class="text-center text-white bg-warning p-2">Disable Course</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Course.Delete')
                        <div class="col-md-3">
                            <a href="{{ route('admin.course-delete') }}">
                                <h4 class="text-center text-white bg-danger p-2">Delete Course</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Setting')
                        <div class="col-md-3">
                            <a href="{{ route('admin.setting.account') }}">
                                <h4 class="text-center text-white bg-dark p-2">Settings</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Role.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.role.index') }}">
                                <h4 class="text-center text-white bg-success p-2">Roles Management</h4>
                            </a>
                        </div>
                    @endcan
                    @can('User.List')
                        <div class="col-md-3">
                            <a href="{{ route('admin.user.index') }}">
                                <h4 class="text-center text-white bg-success p-2">Admin Role Management</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Live.Go_To_Live')
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}">
                                <h4 class="text-center text-white bg-warning p-2"> <i class="mdi mdi-video"></i> Go To Live Video Class</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Live.Set_Live_Timing')
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}">
                                <h4 class="text-center text-white bg-dark p-2"> Set Live Timing With Date</h4>
                            </a>
                        </div>
                    @endcan
                    @can('FB_Group_Live')
                        <div class="col-md-3">
                            @if(courseId())
                                <a href="">
                                    <h4 class="text-center text-white bg-warning p-2"> <i class="mdi mdi-video"></i> Facebook Group Live </h4>
                                </a>
                            @else
                                <a href="">
                                    <h4 class="text-center text-white bg-warning p-2"> <i class="mdi mdi-video"></i> Facebook Group Live </h4>
                                </a>
                            @endif
                        </div>
                    @endcan
                    @can('FB_Group_Access_Code')
                        <div class="col-md-3">
                            <a href="">
                                <h4 class="text-center text-white bg-warning p-2">Facebook Group Access Code</h4>
                            </a>
                        </div>
                    @endcan
                    @can('Push_Notifaction')
                        <div class="col-md-3">
                            <a href="{{ route('admin.dashboard') }}">
                                <h4 class="text-center text-white bg-warning p-2"> Push Notifaction</h4>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
