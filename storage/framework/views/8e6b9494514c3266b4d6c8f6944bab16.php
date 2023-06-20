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
            <div class="col-6 mx-auto">
                <form action="<?php echo e(route('admin.slider.update',$slider->id)); ?>" method="post" class="card border shadow" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline-block">Edit Slider</h3>
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="serial" class="form-label">Serial</label>
                            <input type="number" id="serial" name="serial" value="<?php echo e($slider->serial ?? ''); ?>" class="form-control border border-dark" placeholder="Slider Serial Number">
                            <?php echo $__env->make('backend.admin.components.form_element.input_error',['name'=>'serial'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="image" class="form-control border border-dark">
                            <?php echo $__env->make('backend.admin.components.form_element.input_error',['name'=>'image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-4" style="width: 150px;height: 150px;border-radius: 10px;overflow: hidden;">
                                <img style="width: 100%;height: 100%;" class="img-fluid" src="<?php echo e(asset($slider->image) ?? defaultImage()); ?>" alt="Slider Image">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="serial" class="form-label">Link</label>
                            <input type="url" id="link" name="link" value="<?php echo e($slider->link ?? ''); ?>" class="form-control border border-dark" placeholder="Slider Link">
                            <?php echo $__env->make('backend.admin.components.form_element.input_error',['name'=>'link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <input type="checkbox"
                                   name="is_read"
                                   value="true" id="is_read"
                                   class="border border-dark"
                                   <?php echo e($slider->is_read == true ? 'checked' : ''); ?>

                                   data-switch="secondary"/>
                            <label for="is_read" data-on-label="Yes" data-off-label="No"></label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="is_read" style="cursor: pointer;">Change Read Button Status</label>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <input type="checkbox"
                                   name="is_buy"
                                   value="true" id="is_buy"
                                   <?php echo e($slider->is_buy == true ? 'checked' : ''); ?>

                                   class="border border-dark"
                                   data-switch="secondary"/>
                            <label for="is_buy" data-on-label="Yes" data-off-label="No"></label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="is_buy" style="cursor: pointer;">Change Buy Now Button Status</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/slider/edit.blade.php ENDPATH**/ ?>