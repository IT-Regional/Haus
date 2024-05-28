<?php echo e(Form::model($user,array('route' => array('user.password.update', $user->id), 'method' => 'post'))); ?>

<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('password', __('Password'),['class' => 'col-form-label'])); ?>

       <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Password">
       <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
       <span class="invalid-feedback" role="alert">
               <strong><?php echo e($message); ?></strong>
           </span>
       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('password_confirmation', __('Confirm Password'),['class' => 'col-form-label'])); ?>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Reset'),array('class'=>'btn  btn-primary'))); ?>

</div>

<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\main-file\resources\views/user/reset.blade.php ENDPATH**/ ?>