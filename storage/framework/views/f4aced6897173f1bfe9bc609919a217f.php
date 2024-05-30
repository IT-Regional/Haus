
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Reservar Amenidad')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('reservas.index')); ?>"><?php echo e(__('Lista de amenidades')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reservar Amenidad')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(__('Reservar Amenidad:')); ?> <?php echo e($amenidad->name); ?></h4>
                    <?php echo e(Form::open(['route' => ['reservas.store', $amenidad->id]])); ?>

                        <?php echo e(Form::hidden('amenidad_id', $amenidad->id)); ?>

                        <div class="form-group">
                            <br>
                            <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="500" class="form-label">
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('fecha_reserva', __('Fecha de Reserva'), ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::date('fecha_reserva', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('start_time', __('Hora de Inicio'), ['class' => 'col-form-label'])); ?>

                            <select name="start_time" class="form-control" required>
                                <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($horario->start_time); ?>"><?php echo e($horario->start_time); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('end_time', __('Hora de Fin'), ['class' => 'col-form-label'])); ?>

                            <select name="end_time" class="form-control" required>
                                <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($horario->end_time); ?>"><?php echo e($horario->end_time); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo e(route('reservas.index')); ?>" class="btn btn-light"><?php echo e(__('Cancelar')); ?></a>
                            <?php echo e(Form::submit(__('Reservar'), ['class' => 'btn btn-primary'])); ?>

                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/reservas/create.blade.php ENDPATH**/ ?>