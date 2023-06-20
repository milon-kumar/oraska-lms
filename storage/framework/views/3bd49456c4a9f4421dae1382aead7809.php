<div class="col-md-3 mx-2  d-flex">
    <div href="<?php echo e(route('frontend.details',$course->slug ?? null)); ?>" class="card border" style="border: 1px solid #d0d0d0">
        <?php if($course->image): ?>
            <div class="" style="width: 100%;height: 210px;">
                <img style="width: 100%;height: 100%;" src="<?php echo e(asset($course->image)); ?>" alt="">
            </div>
        <?php else: ?>
            <img src="<?php echo e(asset(config('filesystems.noimage'))); ?>" alt="">
        <?php endif; ?>
        <div class="card-body">
            <h4 class="fw-bold"><?php echo e(Str::limit($course->title,40) ?? ''); ?></h4>
            <small style="font-size: 15px;" class="text-success mb-1 d-block fw-bold">Running...&#10003;</small><br/>
            <a class="mt-2" href="javascript:void(0)">
                <del style="font-size: 18px;" class="text-danger fw-bolder">BDT<?php echo e($course->regular_course_fee); ?></del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 18px;" class="fw-bolder text-primary">BDT <?php echo e($course->full_course_fee); ?></span>
            </a>
            <a href="<?php echo e(route('frontend.details',$course->slug ?? '')); ?>" class="mt-3 d-block btn btn-success btn-sm">Details <i class="mdi mdi-arrow-expand"></i></a>
        </div>
    </div>
</div>

<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/frontend/component/single_course.blade.php ENDPATH**/ ?>