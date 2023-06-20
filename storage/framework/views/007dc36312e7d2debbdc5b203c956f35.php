<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('frontcss'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php $__currentLoopData = \App\Models\Slider::orderBy('serial','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" style="background: url(<?php echo e(asset($slider->image) ?? defaultImage()); ?>);height: 600px;
                    width: 100vw;
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    ">

                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white">First slide label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <?php if($available_course->count() > 0): ?>
    <div class="available_course container my-4">
        <div class="card border border-dark mb-2">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h3>Popular Course</h3>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $available_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card shadow <?php echo e($key % 2 == 0 ? 'bg-success' : 'bg-info'); ?> text-white">
                                <div class="card-body">
                                    <a href=""> <h5 class="bold text-center text-white"><?php echo e(Str::limit($course->title,25) ?? ''); ?></h5></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>আমাদের কথা</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">
                                    <iframe style="object-fit: contain;width: 100%;" height="315" src="https://www.youtube.com/embed/<?php echo e(get_setting('our_youtube_message')); ?>?controls=0&amp;start=420" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">

                                    <div class="" style="height: 315px;text-align: justify;">
                                        <p class="fw-bolder text-dark" style="font-size: 18px;"><?php echo get_setting('our_home_description'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($categories->count() > 0): ?>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    <h2 class="fw-bold"><?php echo e(optional($category)->name); ?> - (<?php echo e($category->publishedCourses->count() > 1 ? $category->publishedCourses->count().' courses' : $category->publishedCourses->count().' course'); ?>) </h2>
                                </div>
                                <div class="card-body">
                                    <?php echo $__env->make('frontend.component.course_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow rounded-0">
                                <div class="card-header">
                                    <h3>Our Course Teacher's</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="teacherSlider">
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <?php echo $__env->make('frontend.component.instractor_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gradient p-4">
        <div class="container">
            <div class="card border border-secondary">
                <div class="" style="background: url(<?php echo e(asset('frontend/img/sslcom.png')); ?>);height: 213px;
                    background-size: 100% 150px contain;
                    background-repeat: no-repeat;
                    width:100%;
                    background-size: 95% 180px;">
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('frontjs'); ?>
    <script>
        $('.slick').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $('#teacherSlider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/frontend/pages/home/home.blade.php ENDPATH**/ ?>