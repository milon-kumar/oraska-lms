<?php $__env->startSection('title','Enrolement-Complete'); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="breadcome py-5" style="background: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(<?php echo e(asset('/frontend/img/bred3.jpg')); ?>) no-repeat ;background-size: cover;">
            <div class="container">
                <h2 class="text-center text-white">Complete Enrolement</h2>
                <p class="text-center text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci assumenda eligendi error eum incidunt, modi, nesciunt obcaecati placeat quasi rerum saepe ullam! Asperiores atque deserunt, dolores qui quos rem.</p>
            </div>
        </div>
        <div class="">
            <!-- Start Content-->
            <div class="container">
                <div class="row my-4">
                    <div class="col-xl-4 col-lg-5 mx-auto">
                        <div class="card text-center border border-dark text-dark">
                            <div class="card-body">
                                <img src="<?php echo e($user->image ? asset($user->image) : asset('images/user.webp')); ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                <h4 class="mb-0 mt-2"><?php echo e($user->name ?? ''); ?></h4>
                                <p class="text-muted font-14"><?php echo e($user->email ?? ''); ?></p>
                                <p>
                                    <?php if($enrole->status): ?>
                                        <span class="badge badge-outline-warning text-uppercase"><?php echo e($enrole->status); ?></span>
                                    <?php endif; ?>
                                </p>


                                <a href="<?php echo e(route('frontend.home')); ?>" class="btn btn-success btn-sm mb-2">Home</a>
                                <a href="<?php echo e(route('student.dashboard')); ?>" class="btn btn-danger btn-sm mb-2">Access Course</a>
                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase">Invoice :</h4>
                                    <p class="text-muted font-13 mb-3">Thanks , For your order this course.  </p>
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Course Name :</strong>
                                        <span class="ms-2"><?php echo e($enrole->course->title ?? ''); ?></span>
                                    </p>
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Enrole Id :</strong>
                                        <span class="ms-2"><span class="badge badge-outline-dark"><?php echo e($enrole->unique_id ?? ''); ?></span></span>
                                    </p>
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Payment Id :</strong>
                                        <span class="ms-2"><span class="badge badge-outline-dark"><?php echo e($enrole->payment->unique_id ?? ''); ?></span></span>
                                    </p>
                                </div>

                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col-->
                </div>
            </div> <!-- container -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/frontend/pages/enrole/enrole_complete.blade.php ENDPATH**/ ?>