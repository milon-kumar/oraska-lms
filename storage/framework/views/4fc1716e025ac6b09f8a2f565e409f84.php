<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo e(config('app.name')); ?> || <?php echo $__env->yieldContent('title','Laravel'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('/')); ?>backend/assets/images/favicon.ico">
    <?php echo $__env->make('backend.admin.includes.header_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="loading show sidebar-enable"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ========== Left Sidebar Start ========== -->
    <?php echo $__env->make('backend.admin.includes.left_side_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <?php echo $__env->make('backend.admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="my-2"></div>
            <?php echo $__env->yieldContent('content'); ?>
            <!-- container -->
        </div>
        <!-- content -->
        <!-- Footer Start -->
        <?php echo $__env->make('backend.admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->

<div class="rightbar-overlay"></div>
<!-- /End-bar -->
<?php echo $__env->make('backend.admin.includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end demo js-->
</body>
</html>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/layouts/app.blade.php ENDPATH**/ ?>