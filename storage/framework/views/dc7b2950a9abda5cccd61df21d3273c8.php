<?php $__env->startSection('title','Edit Course'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 card shadow border mt-3">
            <div class="card-body">
                <h2 class="d-inline-block">Edit Slider</h2>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-9 mx-auto mt-3">
                <div class="card border border-secondary shadow">
                    <div class="card-header">
                        <h4>Edit Slider Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.slider.update',$slider->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="row mb-2">
                                <label class="col-md-3" for="">Serial </label>
                                <div class="col-md-9">
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','min'=>1,'name'=>'serial','value'=>$slider->serial ?? '',], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-md-3" for="">Image</label>
                                <div class="col-md-6">
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','value'=>$slider->image ?? '',], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-md-3">
                                    <img class="img-fluid" src="<?php echo e(asset($slider->image) ?? defaultImage()); ?>" alt="">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-md-3" for="">Link</label>
                                <div class="col-md-9">
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','required'=>'required','name'=>'link','value'=>$slider->link ?? '',], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-md-3" for="">Read More</label>
                                <div class="col-md-9">
                                    <input type="checkbox"
                                           name="is_read"
                                           <?php echo e($slider->is_read == true ? 'checked' : ''); ?>

                                           value="true" id="is_read"
                                           data-switch="secondary"/>
                                    <label for="is_read" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-md-3" for="">Buy Course</label>
                                <div class="col-md-9">
                                    <input type="checkbox"
                                           name="is_buy"
                                           <?php echo e($slider->is_buy == true ? 'checked' : ''); ?>

                                           value="true" id="is_buy"
                                           data-switch="secondary"/>
                                    <label for="is_buy" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success float-end">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/setting/home/slider/edit.blade.php ENDPATH**/ ?>