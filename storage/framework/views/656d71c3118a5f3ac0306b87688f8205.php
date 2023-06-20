<tr>
    <form action="<?php echo e(route('admin.slider.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <th>
            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'number','min'=>1,'name'=>'serial','placeholder'=>'Serial Number'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </th>
        <th>
            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Slider Image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </th>
        <th>
            <?php echo $__env->make('backend.admin.components.form_element.input',['type'=>'url','name'=>'link','placeholder'=>'Link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </th>
        <th><input type="checkbox"
                   name="is_read"
                   value="true" id="is_read"
                   data-switch="secondary"/>
            <label for="is_read" data-on-label="Yes" data-off-label="No"></label>
        </th>
        <th>
            <input type="checkbox"
                   name="is_buy"
                   value="true" id="is_buy"
                   data-switch="secondary"/>
            <label for="is_buy" data-on-label="Yes" data-off-label="No"></label>
        </th>
        <th>
            <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-check-bold"></i></button>
        </th>
    </form>
</tr>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/module/slider/create_form.blade.php ENDPATH**/ ?>