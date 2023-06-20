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
                        <h3 class="header-title d-inline">All Teachers <span class="badge badge-success-lighten"><?php echo e($teachers->count()); ?></span></h3>
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Teacher.Create')): ?>
                            <a href="<?php echo e(route('admin.teacher.create')); ?>" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Teacher</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th class="text-center">Image</th>
                                <th>Phone</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($teacher->name ?? ''); ?></th>
                                        <td>
                                            <div class="" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;">
                                                <img style="width: 100%;height: 100%;" src="<?php echo e(asset($teacher->image) ?? defaultImage()); ?>" alt="<?php echo e($teacher->name); ?>">
                                            </div>
                                        </td>
                                        <td><?php echo e($teacher->phone ?? ''); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Teacher.Edit')): ?>
                                                <a href="<?php echo e(route('admin.teacher.edit',$teacher->id)); ?>" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Teacher.Delete')): ?>
                                                    <a href="Javascript:void(0);" onclick="deleteData(<?php echo e($teacher->id); ?>)" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                                    <form action="<?php echo e(route('admin.teacher.destroy',$teacher->id)); ?>" id="delete-form-<?php echo e($teacher->id); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/teacher/index.blade.php ENDPATH**/ ?>