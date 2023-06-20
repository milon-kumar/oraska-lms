
    <a href="">
        <div class="card text-dark">
            <div class="row g-0 align-items-center">
                <div class="col-md-4">
                    <?php if($teacher->image): ?>
                        <img src="<?php echo e(asset($teacher->image)); ?>" class="card-img" alt="<?php echo e($teacher->name); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('/frontend/img/noimage.jpg')); ?>" class="card-img" alt="<?php echo e($teacher->name); ?>">
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($teacher->name); ?></h5>
                        <p class="card-text"><?php echo Str::limit($teacher->description,50); ?></p>
                        <small><span class="text-dark">Phone:</span><?php echo e($teacher->phone); ?></small>
                        <small><span class="text-dark">Phone:</span><?php echo e($teacher->email); ?></small>
                    </div> <!-- end card-body-->
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
    </a>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/frontend/component/instractor_card.blade.php ENDPATH**/ ?>