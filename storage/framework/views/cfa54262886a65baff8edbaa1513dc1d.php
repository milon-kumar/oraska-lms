<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" value="<?php echo e(date('Y-m-d')); ?>">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title d-inline">All Chapter <span class="badge badge-success-lighten"><?php echo e($chapters->count()); ?></span></h4>
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger float-end">Go Back</a>  &nbsp;&nbsp;
                            <a href="#"   class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Class</a> &nbsp;&nbsp;
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>Chapter Name</th>
                                            <th>Serial Number</th>
                                            <th>Videos</th>
                                            <th>Free Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check mb-2">
                                                        
                                                        <label class="form-check-label" style="cursor: pointer;" for="chapter-<?php echo e($chapter->id); ?>"><?php echo e(optional($chapter)->name); ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo e(optional($chapter)->serial); ?></td>
                                                <td><?php echo e($chapter->videos->count()); ?></td>
                                                <td>
                                                    <input type="checkbox" class="border border-dark" disabled <?php echo e(optional($chapter)->is_free == true ? 'checked' : ''); ?> name="is_free[]" id="switch0" data-switch="success"/>
                                                    <label class="border border-dark" for="switch0" data-on-label="Yes" data-off-label="No"></label>
                                                </td>
                                                <td class="text-right">
                                                    <a href="<?php echo e(route('admin.video-index',$chapter->id)); ?>"class="btn btn-success btn-sm"><i class="mdi mdi-video"></i></a>
                                                    <a href="<?php echo e(route('admin.chapters.edit',$chapter->id ?? '')); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                                    <a href="<?php echo e(route('admin.chapters.delete',$chapter->id ?? '')); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </form>
            </div><!-- end col-->
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <form action="<?php echo e(route('admin.chapters.store')); ?>" method="post" class="modal-content">
                <?php echo csrf_field(); ?>
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="categoryAddModal">Add Classes</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="" id="addRowHere">
                        <div class="row mb-2">
                            <div class="col-lg-1">
                                <label for="">Class Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="name[]" class="form-control">
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <label for="">Class Serial (Integer)</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="number" name="serial[]" class="form-control">
                            </div> <!-- end col -->
                            <div class="col-lg-1">
                                <input type="checkbox" name="is_free[]" id="switch" data-switch="success"/>
                                <label for="switch" data-on-label="Yes" data-off-label="No"></label>
                            </div> <!-- end col -->
                            <div class="col-lg-2">
                                <a id="addFiled" class="btn btn-sm btn-success shadow">+</a>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="addFiled"  class="btn btn-primary float-start" data-bs-dismiss="modal">Close</a>
                    <button type="submit"  class="btn btn-primary">Save changes</button>
                </div>
            </form><!-- /.modal-content -->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var switchLabelName = 0;
        $('#addFiled').click(()=>{
            switchLabelName = switchLabelName + 1;
            console.log(switchLabelName)
            var row = `
            <div class="row mb-2" id="inputRow">
               <div class="col-lg-1">
                                <label for="">Class Name</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="name[]" class="form-control">
                            </div>
            <div class="col-lg-1">
            <label for="">Class Serial</label>
            </div>
            <div class="col-lg-2">
            <input type="text" name="serial[]" class="form-control">
            </div>
               <div class="col-lg-1">
                   <input type="checkbox" name="is_free[]" id="switch`+ switchLabelName+`"  data-switch="success"/>
                   <label for="switch`+ switchLabelName+`" data-on-label="Yes" data-off-label="No"></label>
               </div>
               <div class="col-lg-2">
                   <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
               </div>
            </div> `
            ;
            $("#addRowHere").append(row);
        });

        $("#removeRow").click(()=>{
            $(this).closest().remove();
        });

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputRow').remove();
        });

        function setId(id) {
            console.log(id);
            $.post('<?php echo e(route('set-chapter-id')); ?>' , {chapter_id:id} , function (response) {
                console.log(response);
            });
        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/chapter/index.blade.php ENDPATH**/ ?>