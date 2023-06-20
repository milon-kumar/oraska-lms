
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header text-white bg-dark">
                <h3 class="header-title text-white">Web Front Page Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider.List')): ?>
                        <div class="col-md-3">
                            <a href="<?php echo e(route('admin.slider.index')); ?>">
                                <h4 class="text-center text-white <?php echo e(Route::is('admin.slider.index') ? 'bg-primary' : 'bg-success'); ?> p-2">Cover Image Slider</h4>
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
                            <a href="<?php echo e(route('admin.teacher.index')); ?>">
                                <h4 class="text-center text-white <?php echo e(Route::is('admin.teacher.index') ? 'bg-primary' : 'bg-success'); ?> p-2">Our Course Teacher’s</h4>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Opinion.List')): ?>
                        <div class="col-md-3">
                            <a href="<?php echo e(route('admin.opinion.index')); ?>" onclick="">
                                <h4 class="text-center text-white <?php echo e(Route::is('admin.opinion.*') ? 'bg-primary' : 'bg-success'); ?> p-2">Student Opinion</h4>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/module/dashboard/front_dashboard.blade.php ENDPATH**/ ?>