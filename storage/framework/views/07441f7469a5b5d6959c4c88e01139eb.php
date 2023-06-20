<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white border shadow text-center">
                <div class="card-body">
                    <h1>Athena Science Academy</h1>
                    <h5>You are at <span class="text-capitalize"><?php echo e(auth()->user()->type); ?></span> Mode for creating Full Course</h5>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.admin.components.module.dashboard.dashboard_course_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.admin.components.module.dashboard.admin_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.admin.components.module.dashboard.front_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.admin.components.module.dashboard.chart_one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>