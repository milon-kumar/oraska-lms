<?php $__env->startSection('title','Student Opinion'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
    <?php
        $opinions = \App\Models\Opinion::latest()->paginate(10);
    ?>
    <!-- start page title -->
        <?php echo $__env->make('backend.admin.components.admin_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="border border-secondary">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <h2 class="d-inline-block">Student Opinion</h2>
                        <a class="float-end btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="mdi mdi-plus">  </i> Add Opinion</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="buttons-table-preview">
                                    <table id="datatable-buttons" class="table table-striped table-bordered border border-secondary dt-responsive nowrap w-100">
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

                                                    <a href="<?php echo e(route('admin.opinion.edit',$opinion->id)); ?>" class="btn btn-dark btn-sm"> <i class="mdi mdi-book-edit"></i></a>
                                                    <button  class="btn btn-danger btn-sm" type="button"
                                                             onclick="deleteData(<?php echo e($opinion->id); ?>)"
                                                    >
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                    <form id="delete-form-<?php echo e($opinion->id); ?>" method="POST" action="<?php echo e(route('admin.opinion.destroy', $opinion->id)); ?>" style="display: none">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                        <div class="card-footer">
                            <?php echo $opinions->links(); ?>

                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </section>
    </div>
    <div class="modal fade border border-secondary" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <form action="<?php echo e(route('admin.opinion.store')); ?>" method="post" class="modal-content" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header modal-colored-header bg-dark text-white">
                    <h3 class="modal-title" id="categoryAddModal">Add Opinion's</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="" >
                        <div class="row" id="addRowHere">
                            <div class="col-md-6">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Opinion's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Serial</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'serials[]','placeholder'=>'Serial Number ...'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Profile Image <code class="text-danger">Upload Opinion's Image (300 KB, 900x300 pixels)</code> </label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'images[]','placeholder'=>'Opinion Image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Description <code class="text-danger">Optional</code></label>
                                            <?php echo $__env->make('backend.admin.components.form_element.textarea',['name'=>'descriptions[]','rows'=>2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a id="addFiled" class="btn btn-sm btn-dark shadow float-end">+</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="addFiled"  class="btn btn-dark float-start" data-bs-dismiss="modal">Close</a>
                    <button type="submit"  class="btn btn-dark">Save Teacher's</button>
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
                <div class="col-md-6">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Opinion's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Serial</label>
                                            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','name'=>'serials[]','placeholder'=>'Serial Number ...'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="mb-2">
                <label for="">Profile Image <code class="text-danger">Upload Opinion's Image (300 KB, 900x300 pixels)</code> </label>
<?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'images[]','placeholder'=>'Opinion Image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="mb-2">
                <label for="">Description <code class="text-danger">Optional</code></label>
<?php echo $__env->make('backend.admin.components.form_element.textarea',['name'=>'descriptions[]','rows'=>2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="card-footer">
                <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
                </div>
    </div>
</div>
`;

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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/pages/student/opinion/create.blade.php ENDPATH**/ ?>