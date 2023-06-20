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
                <form action="<?php echo e(route('admin.teacher.update',$teacher->id)); ?>" method="post" enctype="multipart/form-data" class="card border shadow">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline"><?php echo e($title); ?></h3>
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;"><i class="mdi mdi-content-save"></i> Update Teacher </button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="addRowHere">
                            <div class="col-md-9 mx-auto">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Teacher's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Name</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'names','value'=>$teacher->name,'placeholder'=>'Teacher Name ...'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Email Address</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'email','name'=>'emails','value'=>$teacher->email,'placeholder'=>'example@domain.com'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Phone Number</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'phones','value'=>$teacher->phone,'placeholder'=>'017 ** *** ***'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Profile Image <code class="text-danger">Upload Teacher’s Image (300 KB, 900x300 pixels)</code> </label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'images','placeholder'=>'Profile Image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;">
                                                <img style="width: 100%;height: 100%;" src="<?php echo e(asset($teacher->image) ?? defaultImage()); ?>" alt="<?php echo e($teacher->name); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Teacher About</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.textarea',['name'=>'descriptions','rows'=>4,'value'=>$teacher->description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/teacher/edit.blade.php ENDPATH**/ ?>