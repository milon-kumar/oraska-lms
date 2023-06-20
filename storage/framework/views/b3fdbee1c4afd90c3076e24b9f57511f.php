<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block"><?php echo e($title); ?></h2>
                    <a href="<?php echo e(route('admin.role.create')); ?>" class="btn btn-dark float-end"><i class="mdi mdi-plus"> </i> Add New Role</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <table class="table table-bordered border-dark">
                    <tr class="bg-dark text-white" style="background: #494646;">
                        <th>#SL</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($role->name ?? ''); ?></td>
                            <td style="width: 75%;">
                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-dark-lighten rounded"><?php echo e($permission->name ?? ''); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td style="width: 10%;">
                                <a href="<?php echo e(route('admin.role.edit',$role->id)); ?>" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                <?php if($role->name == 'Super_Admin'): ?>
                                    <a href="Javascript:void(0)" onclick="" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                <?php else: ?>
                                    <a href="Javascript:void(0)" onclick="deleteData(<?php echo e($role->id); ?>)" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                    <form class="d-none" action="<?php echo e(route('admin.role.destroy',$role->id)); ?>" method="post" id="delete-form-<?php echo e($role->id); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELEte'); ?></form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div><!-- end col-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/role/index.blade.php ENDPATH**/ ?>