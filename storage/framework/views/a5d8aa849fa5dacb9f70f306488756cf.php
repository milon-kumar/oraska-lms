<textarea name="<?php echo e($name ?? ''); ?>" id="<?php echo e($name ?? ''); ?>" <?php echo e($required ?? ''); ?> class="form-control <?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="<?php echo e($cols ?? ''); ?>" rows="<?php echo e($rows ?? '3'); ?>" placeholder="<?php echo e($placeholder ?? ''); ?>"><?php echo old($name ?? '') ?? $value ?? ''; ?></textarea>
<?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<small class="text-danger"><?php echo e($message); ?></small>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php /**PATH G:\Milon Kumar Tailwind Css\Laravel\Oraska LMS\lms\resources\views/backend/admin/components/form_element/textarea.blade.php ENDPATH**/ ?>