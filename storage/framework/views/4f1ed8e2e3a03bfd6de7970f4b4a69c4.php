<?php echo e(Form::open(['url' => 'lead'])); ?>

<?php
    $plansettings = App\Models\Utility::plansettings();
?>
<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('subject', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('phone_no', __('Phone No'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('phone_no', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'), ['class' => 'btn  btn-primary'])); ?>

</div>

<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/create.blade.php ENDPATH**/ ?>