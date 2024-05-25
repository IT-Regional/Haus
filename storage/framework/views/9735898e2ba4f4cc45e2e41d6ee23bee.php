<?php echo e(Form::model($task, array('route' => array('project.task.update', $task->id), 'method' => 'post'))); ?>

<?php 
$plansettings = App\Models\Utility::plansettings();
?>
<div class="row">
<?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
 <div class="text-end">
      <a href="#" data-size="lg" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['project task'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate')); ?>" float-end>
        <span class="btn btn-primary btn-sm"> <i class="fas fa-robot">  <?php echo e(__('Generate With AI')); ?></span></i>
    </a>
 </div>
 <?php endif; ?>
 
    <div class="form-group col-md-6">
        <?php echo e(Form::label('title', __('Title'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('title', null, array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('priority', __('Priority'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('priority', $priority,null, array('class' => 'form-control multi-select','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('start_date', __('Start Date'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::date('start_date',null,array('class'=>'form-control'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('due_date', __('Due Date'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::date('due_date',null,array('class'=>'form-control'))); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('assign_to', __('Assign To'),['class' => 'col-form-label'])); ?>

        <?php echo Form::select('assign_to', $users, null,array('class' => 'form-control multi-select','required'=>'required')); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('milestone_id', __('Milestone'),['class' => 'col-form-label'])); ?>

        <?php echo Form::select('milestone_id', $milestones, null,array('class' => 'form-control multi-select')); ?>

    </div>
    <div class="form-group  col-md-6">
        <?php echo e(Form::label('hours', __('Estimation Hours'),['class'=>'col-form-label'])); ?>

        <?php echo e(Form::number('hours', null, array('class' => 'form-control','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('description', __('Description'),['class' => 'col-form-label'])); ?>

        <?php echo e(Form::textarea('description',null, array('class' => 'form-control','rows'=>'3'))); ?>

    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn  btn-primary'))); ?>

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
</script><?php /**PATH C:\xampp\htdocs\main-file\resources\views/project/taskEdit.blade.php ENDPATH**/ ?>