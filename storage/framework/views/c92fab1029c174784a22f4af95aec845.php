<input type="<?php echo e($type ?? ''); ?>"
       <?php echo e($required ?? ''); ?>

       <?php echo e($readonly ?? ''); ?>

       name="<?php echo e($name ?? ''); ?>"
       value="<?php echo e(old($name ?? '') ?? $value ?? ''); ?>"
       id="<?php echo e($name ?? ''); ?>"
       min="<?php echo e($min ?? ''); ?>"
       max="<?php echo e($max ?? ''); ?>"
       class="form-control <?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
       placeholder="<?php echo e($placeholder ?? ''); ?>">
<?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<small class="text-danger fw-bolder"><?php echo e($message); ?></small>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/form_element/input.blade.php ENDPATH**/ ?>