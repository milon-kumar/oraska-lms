<?php $__env->startSection('title','Create Course Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block">Course Setup</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <form action="<?php echo e(route('admin.course-details.store')); ?>" method="post" enctype="multipart/form-data" class="card">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                       <h4 class="d-inline-block">Create Course Details - ( <?php echo e($course->title ?? ''); ?> )</h4>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-danger float-end">Go Back</a>



                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'created_by','placeholder'=>'টি' ,'value'=> 'Created By - '.auth()->user()->type, 'required'=>'required','readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','value'=> $course->title,'readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'courses_id','value'=> $course->id,'readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Upload Course Image (300 KB, 900x300 pixels max) <span class="fw-bolder text-danger">*</span></label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>"Upload Course Image"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_course_students','required'=>'required','placeholder'=>'জন'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">রেকর্ডেড ক্লাস ভিভিও সংখ্যা </label>
                                   <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'recorded_class_video','placeholder'=>'টি' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস সংখ্যা </label>
                                   <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'live_classes','placeholder'=>'টি' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস এর সময় </label>
                                   <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_time','placeholder'=>'শনি , সোম , বুধ রাত ৯.০০ টা' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_class_hours','placeholder'=>'ঘণ্টা' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'mcq_exams','placeholder'=>'টি' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'weekly_exams','placeholder'=>'টি' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'paper_final_exams','placeholder'=>'টি' ,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> লাইভ ক্লাস কিভাবে হবে  </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_method','required'=>'required','placeholder'=>' ওয়েবঅ্যাপ ও ফেসবুক '], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>











                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','name'=>'course_buy_video','required'=>'required','placeholder'=>'Input YouTube Video Link Here '], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="projectname" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.textarea',['name'=>'course_description','required'=>'required','rows'=>4,'placeholder'=>'Insert text 5000 characters max'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-6">
                                <div class="mb-3 position-relative">
                                    <label for="project-overview" class="form-label">কোর্স এর শিক্ষক এর নাম ও বর্ণনাঃ (Can Choose Multiple)</label>
                                    <!-- Multiple Select -->
                                    <select class="select2 form-control select2-multiple border border-secondary" name="teachers[]" data-toggle="select2" multiple="multiple" data-placeholder="Select Course Teacher" required>
                                        <?php $__currentLoopData = \App\Models\Teacher::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($teacher->id ?? ''); ?>"><?php echo e($teacher->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Add Facebook Private Discussion Group Link <code>https://www.example.com</code></label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','name'=>'fb_private_discussion_group','required'=>'required','placeholder'=>'Insert the link of facebook private group'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Tag</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','required'=>'required','placeholder'=>'Input YouTube Video Tag Here'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Regular Course Fee</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'regular_course_fee','readonly'=>'readonly','value'=>$course->regular_course_fee,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Discount</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','readonly'=>'readonly','value'=>$course->discount_fee,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Full Course Fee (after Discount)</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->category->name,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'date','name'=>'enrollment_validity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Maximum view permit per video</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'video_view_permit','placeholder'=>'View Permit','value'=>3,], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark btn-lg float-end">Save Course Details</button>
                    </div>
                </form> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/course_details/create.blade.php ENDPATH**/ ?>