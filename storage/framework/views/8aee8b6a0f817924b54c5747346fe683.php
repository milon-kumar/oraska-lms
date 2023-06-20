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
                        <h3 class="header-title d-inline-block">All Opinions<span class="badge badge-success-lighten"><?php echo e($opinions->count() ?? 0); ?></span></h3>
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Teacher.Create')): ?>
                            <a href="<?php echo e(route('admin.opinion.create')); ?>" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Opinion</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped border border-dark text-dark">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th class="text-center">Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $opinions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $opinion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href=""><?php echo e($opinion->serial ?? $loop->iteration); ?></a>
                                    </td>
                                    <td class="text-center mx-auto">
                                        <div class="text-center mx-auto" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;">
                                            <img class="text-center" src="<?php echo e(asset($opinion->image) ?? defaultImage()); ?>" style="width: 100%;height: 100%;" alt="Opinion Image">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo Str::limit($opinion->description,500); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Opinion.Edit')): ?>
                                            <a href="<?php echo e(route('admin.opinion.edit',$opinion->id)); ?>" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Opinion.Delete')): ?>
                                            <a href="Javascript:void(0);" onclick="deleteData(<?php echo e($opinion->id); ?>)" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                            <form action="<?php echo e(route('admin.opinion.destroy',$opinion->id)); ?>" id="delete-form-<?php echo e($opinion->id); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/opinion/index.blade.php ENDPATH**/ ?>