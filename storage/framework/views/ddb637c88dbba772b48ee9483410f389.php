<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- start page title -->
        <?php echo $__env->make('backend.admin.components.admin_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <section class="border border-secondary">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <h2 class="d-inline-block">আমাদের কথা</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <form action="<?php echo e(route('admin.setting.update')); ?>" method="post" class="col-6 mt-3 px-3">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4>Our Message</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="types[]" value="our_youtube_message">
                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'our_youtube_message','value'=>get_setting('our_youtube_message'),'placeholder'=>'Input YouTube Video ID Here'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
                <form action="<?php echo e(route('admin.setting.update')); ?>" method="post" class="col-6 mt-3 px-3">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="types[]" value="our_home_description">
                            <textarea name="our_home_description" class="form-control" rows="5" placeholder="Insert text 5000 characters max"><?php echo get_setting('our_home_description'); ?></textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-dark btn-sm float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/setting/home/our_talk.blade.php ENDPATH**/ ?>