<?php
    use App\Models\Course;
    $courses = Course::with(['category:id,name','videos','chapters'])->latest()->orderBy('id','DESC')->get();
?>

<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title d-inline">All Course <span class="badge badge-success-lighten"><?php echo e($courses->count()); ?></span></h4>
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
                                <th>Copy Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="form-check mb-2">
                                            <input type="radio" name="course_id" id="course-<?php echo e($course->id); ?>" onclick="setId(<?php echo e($course->id); ?>)">
                                            <label class="form-check-label" style="cursor: pointer;" for="course-<?php echo e($course->id); ?>"><?php echo e(optional($course)->title); ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo e($course->chapters->count() ?? 0); ?></td>
                                    <td><?php echo e($course->videos->count() ?? 0); ?></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <?php if($course->is_copy == true): ?>
                                            <span class="badge badge-danger-lighten text-uppercase">Copy Course</span>                                            </td>
                                        <?php endif; ?>
                                    <td>
                                    <td>
                                        <?php if($course->status == 'published'): ?>
                                            <a href="#" class="btn btn-success btn-sm">Running...</a>
                                        <?php else: ?>
                                            <a href="" class="btn btn-danger btn-sm">Published</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card body-->
        </div>
    </div>
</div>
<div class="row">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Create')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.course.create')); ?>">
            <h4 class="text-center text-white bg-success p-2">Add New Course</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Copy')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.course-copy')); ?>">
            <h4 class="text-center text-white bg-success p-2">Full Course Copy & Paste</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Book.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <h4 class="text-center text-white bg-warning p-2"> Add / Edit Book Shop</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Exam.Dashboard')): ?>
    <div class="col-md-3">
        <a href="#" onclick="">
            <h4 class="text-center text-white bg-danger p-2">Create Exam Dashboard</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CourseDetails.Create')): ?>
    <div class="col-md-3">
        <a href=" <?php echo e(route('admin.course-details.create')); ?> " <?php if(courseId()): ?>
        style="pointer-events: none;"
            <?php endif; ?>>
            <h4 class="text-center text-white bg-primary p-2">Course Setup</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Edit_Content')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.course.edit-course')); ?>">
            <h4 class="text-center text-white bg-info p-2">Edit Course Content</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Show')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.course.preview-course')); ?>">
            <h4 class="text-center text-white bg-info p-2">Preview Course</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Class.Attendance')): ?>
    <div class="col-md-3">
        <a href="">
            <h4 class="text-center text-white bg-dark p-2">Class Attendance Dashboard</h4>
        </a>
    </div>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Exam.Dashboard')): ?>
    <div class="col-md-3">
        <a href="">
            <h4 class="text-center text-white bg-dark p-2">Course Exam Dashboard</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Comment.List')): ?>
    <div class="col-md-3">
        <a href="">
            <h4 class="text-center text-white bg-success p-2">Replay Class Comments</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Complain.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.complain.index')); ?>">
            <h4 class="text-center text-white bg-success p-2">Complain Box</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Student.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.complain.index')); ?>">
            <h4 class="text-center text-white bg-success p-2">Transfer Student</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Post.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.post.index')); ?>">
            <h4 class="text-center text-white bg-danger p-2">Community Post</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Student.Dashboard_Download')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.student.index')); ?>">
            <h4 class="text-center text-white bg-info p-2">Download Student Database</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Status')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.all-course')); ?>">
            <h4 class="text-center text-white bg-dark p-2">Publish Course</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CourseDetails.Edit')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.change-course-free')); ?>">
            <h4 class="text-center text-white bg-info p-2">Change Course Fee</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Enroll.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.enrole.approve')); ?>">
            <h4 class="text-center text-white bg-secondary p-2">Add Student Manually</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CourseDetails.Edit')): ?>
    <div class="col-md-3">
        <a href="">
            <h4 class="text-center text-white bg-success p-2">Generate Discount Card</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Exam.Free_Result')): ?>
    <div class="col-md-3">
        <a href="">
            <h4 class="text-center text-white bg-primary p-2">View Free Exam Result</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Status')): ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('admin.decline-course')); ?>">
                <h4 class="text-center text-white bg-warning p-2">Disable Course</h4>
            </a>
        </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Course.Delete')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.course-delete')); ?>">
            <h4 class="text-center text-white bg-danger p-2">Delete Course</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Setting')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.setting.account')); ?>">
            <h4 class="text-center text-white bg-dark p-2">Settings</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Role.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.role.index')); ?>">
            <h4 class="text-center text-white bg-success p-2">Roles Management</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.user.index')); ?>">
            <h4 class="text-center text-white bg-success p-2">Admin Role Management</h4>
        </a>
    </div>
    <?php endif; ?>
</div>
<div class="row">

</div>
<div class="row my-4">
    <div class="col-md-12 bg-primary text-white text-center">
        <h3 class="fw-bolder text-white">Web Front Page Dashboard</h3>
    </div>
</div>
<div class="row">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <h4 class="text-center text-white <?php echo e(Route::is('admin.dashboard') ? 'bg-primary' : 'bg-success'); ?> p-2">Cover Image Slider</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Our_Talk')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.our-talk')); ?>">
            <h4 class="text-center text-white <?php echo e(Route::is('admin.our-talk') ? 'bg-primary' : 'bg-success'); ?> p-2">আমাদের কথা</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Teacher.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.teacher.create')); ?>">
            <h4 class="text-center text-white <?php echo e(Route::is('admin.teacher.create') ? 'bg-primary' : 'bg-success'); ?> p-2">Our Course Teacher’s</h4>
        </a>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Opinion.List')): ?>
    <div class="col-md-3">
        <a href="<?php echo e(route('admin.opinion.create')); ?>" onclick="">
            <h4 class="text-center text-white <?php echo e(Route::is('admin.opinion.*') ? 'bg-primary' : 'bg-success'); ?> p-2">Student Opinion</h4>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/admin_tools.blade.php ENDPATH**/ ?>