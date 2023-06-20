<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1><?php echo e($title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline-block">All Slider <span class="badge badge-success-lighten"><?php echo e($sliders->count() ?? 0); ?></span></h3>
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped border border-dark text-dark">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Slider <code>Upload Cover Image (300 KB max, 1920 x 1080 pixels)</code></th>
                                <th>Link</th>
                                <th>Read More</th>
                                <th>Buy Course</th>
                                <th>Action</th>
                            </tr>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider.Create')): ?>
                                <?php echo $__env->make('backend.admin.components.module.slider.create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>Image - <?php echo e($slider->serial ?? $loop->iteration); ?></td>
                                        <td>
                                            <div class="" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;margin: 0 auto;">
                                                <img src="<?php echo e(asset($slider->image) ?? defaultImage()); ?>" style="width: 100%;height: 100%;" class="img-fluid" alt="Slider Image">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($slider->link ?? ''); ?>" target="_blank"><?php echo e(Str::limit($slider->link , 20)); ?></a>
                                        </td>
                                        <td>
                                            <?php if($slider->is_read == true): ?>
                                                <span class="fw-bolder text-success">Read More</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($slider->is_buy == true): ?>
                                                <span class="fw-bolder text-success">Buy Course</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider.Edit')): ?>
                                            <a href="<?php echo e(route('admin.slider.edit',$slider->id ?? '')); ?>" class="btn btn-success">
                                                <i class="mdi mdi-book-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider.Delete')): ?>
                                            <a href="" class="btn btn-danger" onclick="deleteData(<?php echo e($slider->id); ?>)">
                                                <i class="mdi mdi-trash-can"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.slider.destroy',$slider->id)); ?>" id="delete-form-<?php echo e($slider->id); ?>" method="post" class="d-none">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/slider/index.blade.php ENDPATH**/ ?>