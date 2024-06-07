

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Detalles de la Amenidad Reservada')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('reservas.index')); ?>"><?php echo e(__('Reservas')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detalles')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label><?php echo e(__('Fecha de Reserva')); ?></label>
                        <p><?php echo e($reserva->fecha_reserva); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Hora de Inicio')); ?></label>
                        <p><?php echo e($reserva->start_time); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Hora de Fin')); ?></label>
                        <p><?php echo e($reserva->end_time); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Amenidad')); ?></label>
                        <p><?php echo e($reserva->amenidad->name); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Descripción')); ?></label>
                        <p><?php echo e($reserva->amenidad->description); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Capacidad')); ?></label>
                        <p><?php echo e($reserva->amenidad->ability); ?></p>
                    </div>
                    <div class="form-grouo">
                        <label><?php echo e(__('Residente')); ?></label>
                        <p><?php echo e($reserva->user->name); ?></p>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Foto de la Amenidad')); ?></label>
                        <br>
                        <img src="<?php echo e(asset($reserva->amenidad->photo)); ?>" alt="Foto" width="500">
                    </div>
                    <a href="<?php echo e(route('reservas.index')); ?>" class="btn btn-primary"><?php echo e(__('Volver a Reservas')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\main-file\resources\views/amenidades/show.blade.php ENDPATH**/ ?>