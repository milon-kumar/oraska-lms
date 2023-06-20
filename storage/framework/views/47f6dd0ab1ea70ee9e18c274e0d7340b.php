<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block"><?php echo e($title); ?></h2>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger float-end"><i class="mdi mdi-arrow-left"> </i> Go Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="<?php echo e(route('admin.user.update',$user->id)); ?>" method="post" class="col-8 mx-auto mt-3 card border border-secondary">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Select Role</label>
                            <select class="form-control border border-secondary" name="role" data-placeholder="Select Role" required>
                                <option class="d-none" selected>~~~Select Role~~~</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($u_role->name == $role->name ? 'selected' : ''); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            value="<?php echo e($role->name ?? ''); ?>"><?php echo e($role->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">User Name</label>
                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','placeholder'=>'User Name','required'=>'required','value'=>$user->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Email Address</label>
                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'email','name'=>'email','placeholder'=>'Email Address','required'=>'required','value'=>$user->email,'readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark float-end">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/user/edit.blade.php ENDPATH**/ ?>