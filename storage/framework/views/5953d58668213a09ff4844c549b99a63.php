<?php
    use App\Models\Course;
    $courses = Course::with(['category:id,name','videos','chapters'])->latest()->orderBy('id','DESC')->get();
?>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header text-white bg-dark">
                <h3 class="header-title d-inline">All Course <span class="badge badge-success-lighten"><?php echo e($courses->count()); ?></span></h3>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 text-dark">
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
                        <tr class="text-dark">
                            <td>
                                <div class="form-check form-radio-dark">
                                    <input type="radio" name="course_id" id="course-<?php echo e($course->id); ?>" onclick="setId(<?php echo e($course->id); ?>)" class="form-check-input border border-dark">
                                    <label class="form-check-label fw-bolder" style="cursor: pointer;" for="course-<?php echo e($course->id); ?>"><?php echo e(optional($course)->title); ?></label>
                                </div>
                            </td>
                            <td><?php echo e($course->chapters->count() ?? 0); ?></td>
                            <td><?php echo e($course->videos->count() ?? 0); ?></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <?php if($course->is_copy == true): ?>
                                    <span class="badge badge-dark-lighten text-uppercase">Copy Course</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($course->status == 'published'): ?>
                                    <a href="#" class="btn btn-dark btn-sm">Running...</a>
                                <?php else: ?>
                                    <a href="" class="btn btn-danger btn-sm">Published</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/module/dashboard/dashboard_course_table.blade.php ENDPATH**/ ?>