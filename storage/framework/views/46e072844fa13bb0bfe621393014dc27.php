
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Crear amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reservas')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Nombre')); ?></th>
                                    <th><?php echo e(__('Descripcion')); ?></th>
                                    <th><?php echo e(__('Foto')); ?></th>
                                    <th><?php echo e(__('Fecha de reserva')); ?></th>
                                    <th><?php echo e(__('Hora de inicio')); ?></th>
                                    <th><?php echo e(__('Hora de fin')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($reserva->amenidad->name); ?></td>
                                        <td><?php echo e($reserva->user->name); ?></td>
                                        <td><?php echo e($reserva->amenidad->photo); ?></td>
                                        <td><?php echo e($reserva->fecha_reserva); ?></td>
                                        <td><?php echo e($reserva->start_time); ?></td>
                                        <td><?php echo e($reserva->end_time); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/reservas.blade.php ENDPATH**/ ?>