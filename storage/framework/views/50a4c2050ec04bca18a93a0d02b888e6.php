<?php $__env->startSection('title','Edit Course Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
       <?php echo $__env->make('backend.admin.components.page_header',['title'=>'Course Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-12 mt-3">
                <form action="<?php echo e(route('admin.course-details.update',$course->courseDetails->id ?? '')); ?>" method="post" enctype="multipart/form-data" class="card">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="card-header">
                        <h4 class="d-inline-block">Edit Course Details - ( <?php echo e($course->title ?? ''); ?> )</h4>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-danger float-end">Go Back</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo e(route('admin.course-by-chapter',$course->id)); ?>" class="btn btn-success float-end">Classes</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo e(route('admin.course.show',$course->id)); ?>" class="btn btn-primary float-end">Exams</a> </div> &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'created_by','placeholder'=>'টি' ,'value'=> 'Created By - '.auth()->user()->type,'readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Course Title</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'title','value'=> $course->title,'required'=>'required'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'courses_id','value'=> $course->id,'readonly'=>'readonly'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">Upload Course Image (300 KB, 900x300 pixels max)</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Course Details Image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> কোর্সটি করছেন </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_course_students','required'=>'required','placeholder'=>'জন','value'=>$course->courseDetails->total_course_students ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">রেকর্ডেড ক্লাস ভিভিও সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'recorded_class_video','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->recorded_class_video ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'live_classes','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->live_classes ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label">লাইভ ক্লাস এর সময় </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_time','placeholder'=>'শনি , সোম , বুধ রাত ৯.০০ টা' ,'required'=>'required','value'=>$course->courseDetails->live_class_time ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> মোট ক্লাস ঘণ্টা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'total_class_hours','placeholder'=>'ঘণ্টা' ,'required'=>'required','value'=>$course->courseDetails->total_class_hours ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> M.C.Q পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'mcq_exams','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->mcq_exams ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সাপ্তাহিক পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'weekly_exams','placeholder'=>'টি' ,'required'=>'required','value'=>$course->courseDetails->weekly_exams ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> পেপার ফাইনাল পরীক্ষা সংখ্যা </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'paper_final_exams','placeholder'=>'টি' ,'required'=>'required' ,'required'=>'required','value'=>$course->courseDetails->paper_final_exams ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> ক্লাস কি ওয়েব অ্যাপ এ রেকর্ড করে সাজানো থাকবে </label>
                                    <!-- Custom Switch -->
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" <?php echo e($course->courseDetails->class_recorded == 1 ? 'checked' : ''); ?> class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">Yes For Recorded</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> লাইভ ক্লাস কিভাবে হবে  </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'live_class_method','required'=>'required','placeholder'=>' ওয়েবঅ্যাপ ও ফেসবুক','value'=>$course->courseDetails->live_class_method ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="mb-3">
                                    <label for="projectname" class="form-label"> সচরাচর জিজ্ঞাসা <br> কোর্স টি কিভাবে কিনবো
                                        <br> বি. দ্র. কোর্স কেনার পূর্বে এই ভিডিও দেখে নাও  </label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','name'=>'course_buy_video','required'=>'required','placeholder'=>'Input YouTube Video Link Here ','value'=>$course->courseDetails->course_buy_video ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="projectname" class="form-label">কোর্স এর বিস্তারিত বিবরন</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.textarea',['name'=>'course_description','required'=>'required','rows'=>4,'placeholder'=>'Insert text 5000 characters max','value'=>$course->courseDetails->course_description ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-6">
                                <div class="mb-3 position-relative">
                                    <label for="project-overview" class="form-label">কোর্স এর শিক্ষক এর নাম ও বর্ণনাঃ (Can Choose Multiple)</label>
                                    <!-- Multiple Select -->
                                    <select class="select2 form-control select2-multiple border border-secondary" name="teachers[]" data-toggle="select2" multiple="multiple" data-placeholder="Select Course Teacher">
                                        <?php $__currentLoopData = \App\Models\Teacher::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                <?php echo e(in_array($teacher->id ,json_decode($course->courseDetails->teachers ?? []) ?? [] ) ? 'selected' : ''); ?>

                                                value="<?php echo e($teacher->id ?? ''); ?>"><?php echo e($teacher->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>



                                </div>

                                <!-- Date View -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Add Facebook Private Discussion Group Link <code>https://www.example.com</code></label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','name'=>'fb_private_discussion_group','required'=>'required','placeholder'=>'Insert the link of facebook private group','value'=>$course->courseDetails->fb_private_discussion_group ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Introduction Video Tag</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'text','name'=>'course_introduction_video','required'=>'required','placeholder'=>'Input YouTube Video Tag Here','value'=>$course->courseDetails->course_introduction_video ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>












                                <div class="mb-3 position-relative">
                                    <label class="form-label">Course Category</label>
                                    <select class="form-control select2" name="categories_id" data-toggle="select2">
                                        <?php $__currentLoopData = \App\Models\Category::where('status','published')->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id == $course->categories_id ? 'selected' : ''); ?>"><?php echo e($category->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Enrollment Validity (Months)</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'date','name'=>'enrollment_validity','value'=>$course->courseDetails->enrollment_validity ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Maximum view permit per video</label>
                                    <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'video_view_permit','placeholder'=>'View Permit','value'=>3,'value'=>$course->courseDetails->video_view_permit ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="position-relative">
                                    <div class="card border shadow-sm">
                                        <div class="card-body">
                                            <img style="width: 100%;height: auto;" src="<?php echo e($course->courseDetails->image ? asset($course->courseDetails->image) : defaultImage()); ?>" alt="<?php echo e($course->slug ?? 'Image Not Found'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark btn-lg float-end">Update Course Details</button>
                    </div>
                </form> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/course_details/edit.blade.php ENDPATH**/ ?>