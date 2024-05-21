<?php echo e(Form::open(['url' => 'lead'])); ?>

<?php
    $plansettings = App\Models\Utility::plansettings();
?>
<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
        <div class="text-end">
            <a href="#" data-size="lg" data-ajax-popup-over="true" data-url="<?php echo e(route('generate', ['lead'])); ?>"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>"
                data-title="<?php echo e(__('Generate')); ?>" float-end>
                <span class="btn btn-primary btn-sm">
                    <i class="fas fa-robot"> <?php echo e(__('Generate With AI')); ?> </i>
                </span>
            </a>
        </div>
    <?php endif; ?>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('subject', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('user_id', __('Employee'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('user_id', $employees, '', ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

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



<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>

<script>
    if ($(".multi-select").length > 0) {
        $($(".multi-select")).each(function(index, element) {
            var id = $(element).attr('id');
            var multipleCancelButton = new Choices(
                '#' + id, {
                    removeItemButton: true,
                }
            );
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\main-file\resources\views/lead/create.blade.php ENDPATH**/ ?>