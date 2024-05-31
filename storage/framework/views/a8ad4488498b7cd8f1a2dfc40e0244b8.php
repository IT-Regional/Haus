<?php echo e(Form::open(array('url' => 'noticeBoard'))); ?>

<?php 
$plansettings = App\Models\Utility::plansettings();
?>
<div class="row">
<?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
 <div class="text-end">
      <a href="#" data-size="lg" data-ajax-popup-over="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" 
    data-url="<?php echo e(route('generate',['notice board'])); ?>" data-title="<?php echo e(__('Generate')); ?>" float-end>
        <span class="btn btn-primary btn-sm"> <i class="fas fa-robot">  <?php echo e(__('Generate With AI')); ?></span></i>
    </a>
 </div>
 <?php endif; ?>
 
    <div class="form-group col-md-12">
        <?php echo e(Form::label('heading', __('Notice Heading') ,['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('heading', '', array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group row">
        <div class="form-group col-md-12">
            <div class="form-check form-check-inline">
                <input class="form-check-input type" type="radio" name="type" value="Client" 
                    id="customCheckinlh1" checked="checked">
                <label class="form-check-label" for="customCheckinlh1">
                    <?php echo e(__('To Clients')); ?>

                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input type" type="radio" name="type" value="Employee" 
                    id="customCheckinlh2">
                <label class="form-check-label" for="customCheckinlh2">
                    <?php echo e(__('To Employees')); ?>

                </label>
            </div>
        </div>  
    </div>


    <div class="form-group col-md-12 department d-none">
        <?php echo e(Form::label('department', __('Department') ,['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('department', $departments,null, array('class' => 'form-control multi-select'))); ?>

    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('notice_detail', __('Notice Details') ,['class' => 'col-form-label'])); ?>

        <?php echo Form::textarea('notice_detail', null, ['class'=>'form-control','rows'=>'3']); ?>

    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn  btn-primary'))); ?>

</div>

<?php echo e(Form::close()); ?>



<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script>
    if ($(".multi-select").length > 0) {
              $( $(".multi-select") ).each(function( index,element ) {
                  var id = $(element).attr('id');
                     var multipleCancelButton = new Choices(
                          '#'+id, {
                              removeItemButton: true,
                          }
                      );
              });
         }

  </script><?php /**PATH C:\xampp\htdocs\main-file\resources\views/noticeBoard/create.blade.php ENDPATH**/ ?>