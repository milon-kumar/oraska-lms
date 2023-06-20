<?php $__env->startSection('title',$course->title ?? 'Course Details'); ?>
<?php $__env->startSection('frontcss'); ?>
    <style>
        .instraction-video iframe{
            width: 100%;
            height: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div
            class="text-center mb-2"
            style="padding: 10px 0;background: linear-gradient(rgba(0,15,52,0.95),rgba(69,0,0,0.94)), url(<?php echo e(asset( $course->image ?? defaultImage())); ?>);background-size: cover;backdrop-filter: blur(10)"
        >
            <h1 class="text-uppercase fw-bold text-white">Athena Science Academy</h1>
            <h4 class="text-white fw-semibold"><?php echo e($course->title ?? ''); ?></h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border border-secondary mb-2">
                        <div class="" style="width: 100%;height: 300px;overflow: hidden;">
                            <img
                                class="card-img-top"
                                style="width: 100%;height: 100%;object-fit: cover;"
                                src="<?php echo e(asset($course->courseDetails->image ?? config('filesystems.noimage'))); ?>"
                                alt="<?php echo e($course->slug ?? ''); ?>">
                        </div>
                        <div class="card-body">
                            <p class="text-"><?php echo $course->courseDetails->course_description ?? ' '; ?></p>

                            <table class="table table-striped">
                                <tr>
                                    <th>কোর্সটি করছেনঃ </th>
                                    
                                    <td><?php echo e(\App\Models\Enrole::count() + optional($course?->courseDetails)->total_course_students?? 0); ?> জন</td>
                                </tr>
                                <tr>
                                    <th>রেকর্ডেড ক্লাস ভিভিও সংখ্যাঃ</th>
                                    <td><?php echo e($course->courseDetails->total_course_videos ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>লাইভ ক্লাস সংখ্যাঃ</th>
                                    <td><?php echo e($course->courseDetails->live_classes ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>লাইভ ক্লাস এর সময়ঃ</th>
                                    <td><?php echo e($course->courseDetails->live_class_time ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>মোট ক্লাস ঘণ্টাঃ </th>
                                    <td><?php echo e($course->courseDetails->total_class_hower ?? 0); ?> ঘণ্টা</td>
                                </tr>
                                <tr>
                                    <th>M.C.Q পরীক্ষা সংখ্যাঃ </th>
                                    <td><?php echo e($course->courseDetails->mcq_exams ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>সাপ্তাহিক পরীক্ষা সংখ্যাঃ </th>
                                    <td><?php echo e($course->courseDetails->weekly_exams ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>পপপার ফাইনাল পরীক্ষা সংখ্যাঃ </th>
                                    <td><?php echo e($course->courseDetails->peper_final_exams ?? 0); ?> টি</td>
                                </tr>
                                <tr>
                                    <th>ক্লাস কি ওয়েবঅ্যাপে সাজানো থাকবেঃ </th>
                                    <td> <?php echo e(optional($course->courseDetails)->class_recorded == 1 ? 'হ্যাঁ' : 'না' ?? ''); ?></td>
                                </tr>
                                <tr>
                                    <th>লাইভ ক্লাস কিভাবে হবেঃ </th>
                                    <td><?php echo e($course->courseDetails->live_class_method); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card border border-secondary mb-2">
                        <div class="card-body">
                            <h3>সচরাচর জিজ্ঞাসাঃ </h3>
                            <h5>কোর্স টি কিভাবে কিনবো?</h5>
                            <p>কোর্স টি কেনার পূর্বে ভিডিও টি দেখে নাও</p>
                            <a target="_blank" href="<?php echo e($course->courseDetails?->course_buy_video ?? 'javascript:void(0)'); ?>"><?php echo e($course->courseDetails?->course_buy_video ?? ''); ?></a>
                        </div>
                    </div>
                    <?php $__currentLoopData = json_decode($course->courseDetails->teachers); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $teacher = \App\Models\Teacher::findOrFail($teacher_id)
                        ?>
                    <div class="card border border-secondary mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="user-image">
                                        <img
                                            src="<?php echo e($teacher->image ? asset($teacher->image) : defaultImage()); ?>"
                                            alt="<?php echo e($course->courseDetails->teacher->name ?? 'No Image'); ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5> Course Teacher</h5>
                                    <table>
                                        <tr>
                                            <th class="font-22 fw-semibold"><?php echo e($teacher->name ?? ''); ?></th>
                                        </tr>
                                        <tr>
                                            <td><?php echo e($teacher->description ?? ''); ?></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="d-flex align-items-center" style="margin-top: 25px;">
                                                    <a
                                                        class="d-flex justify-content-center align-items-center"
                                                        style="width: 40px;height: 40px;border-radius: 50px;background: radial-gradient(#0165E1,#17A9FD);margin-right: 20px;color: white;"
                                                        href="<?php echo e($teacher->fb_page ?? ''); ?>"
                                                        target="_blank"
                                                    >
                                                        <i class="mdi mdi-facebook mdi-24px"></i>
                                                    </a>
                                                    <a
                                                        class="d-flex justify-content-center align-items-center"
                                                        style="width: 40px;height: 40px;border-radius: 50px;background: radial-gradient(#FF0000,#ff0000);color: white;"
                                                        href="<?php echo e($teacher->youtube_chanel ?? ''); ?>"
                                                        target="_blank"
                                                    >
                                                        <i class="mdi mdi-youtube mdi-24px"></i>
                                                    </a>
                                                </div>

                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-md-4">
                    <div class="card border border-secondary mb-2">
                        <div class="card-img-top">
                            <div class="instraction-video">
                                <iframe style="width: 100%;height: auto; min-height: 250px;" src="https://www.youtube.com/embed/<?php echo $course->courseDetails->course_introduction_video ?? ''; ?>"></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4>Full Course Fee : <del style="font-size: 18px;" class="text-danger fw-bolder">BDT<?php echo e($course->regular_course_fee); ?></del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>&nbsp;
                                <span style="font-size: 18px;" class="fw-bolder text-primary">BDT <?php echo e($course->full_course_fee); ?></span>
                            <h4>Category : <?php echo e($course->category->name ?? ''); ?> </h4>
                            <h4>Enrollment Validity : <?php echo e($course->courseDetails->enrollment_validity ?? ''); ?> Months</h4>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('frontend.enrole',$course->slug ?? '')); ?>" class="btn btn-success">কোর্সটিতে ভর্তি হও</a>

                            <input type="hidden" value="<?php echo e(url('/details/'.$course->slug)); ?>" id="copyLink">
                            <a href="javascript:void(0);" onclick="copyLink()" class="btn btn-success">
                                <i class="mdi mdi-share"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="border border-secondary">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <h4>Free Sample Classes</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion custom-accordion" id="custom-accordion-one">
                                <?php $__currentLoopData = $course->chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card mb-0">
                                    <div class="card-header" id="heading-<?php echo e($key); ?>">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title d-block py-1"
                                               data-bs-toggle="collapse" href="#collapse-<?php echo e($key); ?>"
                                               aria-expanded="true" aria-controls="collapse-<?php echo e($key); ?>"
                                               disabled
                                            >
                                                <?php if($chapter->is_free == 1): ?>
                                                    <i class=""></i>
                                                <?php else: ?>
                                                    <i class="mdi mdi-lock">&nbsp;</i>
                                                <?php endif; ?>
                                                    <?php echo e($loop->iteration); ?> . <?php echo e($chapter->name); ?><i
                                                    class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-<?php echo e($key); ?>" class="collapse"
                                         aria-labelledby="heading-<?php echo e($key); ?>"
                                         data-bs-parent="#custom-accordion-one">
                                        <div class="card-body">
                                            <ul class="navbar-nav">
                                                <?php $__currentLoopData = $chapter->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href=""><i class="mdi mdi-play-circle"></i> <?php echo e($loop->iteration); ?> . <?php echo e($video->video_title ?? ''); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <h4>Free Sample Classes</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion custom-accordion" id="custom-accordion-one">
                               NO Question Found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('frontjs'); ?>
    <script>
        function copyLink() {
            const url = document.getElementById('copyLink').value;
            navigator.clipboard.writeText(url);
            alert("Shear Link Copid")
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/frontend/pages/course/details.blade.php ENDPATH**/ ?>