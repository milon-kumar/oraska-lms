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
            <form action="<?php echo e(route('admin.role.update',$role->id)); ?>" method="post" class="col-12 mt-3 card">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" value="<?php echo e($role->name ?? ''); ?>" class="form-control border <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid border-danger <?php else: ?> border-dark  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" required placeholder="Role Name">
                            <button class="btn btn-dark" type="submit"><i class="mdi mdi-content-save"></i> Update Role</button>

                        </div>
                        <div class="">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <hr class="border border-dark" />
                    <div class="row">
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 mb-2">
                                <div class="card h-100 border">
                                    <div class="card-header bg-dark text-white">
                                        <h5><?php echo e($key); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex align-items-center mb-2">
                                                <input style="cursor: pointer;" type="checkbox" name="permissions[]"
                                                       <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <?php echo e($single_permission->name ==  $r_permission->name ? 'checked' : ''); ?>

                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       value="<?php echo e($single_permission->name); ?>" id="<?php echo e($single_permission->name.$loop->iteration); ?>" data-switch="secondary"/>
                                                <label for="<?php echo e($single_permission->name.$loop->iteration); ?>" data-on-label="Yes" data-off-label="No"></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label style="cursor: pointer;" class="fw-bolder" for="<?php echo e($single_permission->name.$loop->iteration); ?>"><?php echo e($single_permission->name ?? ''); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/role/edit.blade.php ENDPATH**/ ?>