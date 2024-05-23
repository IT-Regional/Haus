
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Reservar Amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reservar Amenidad')); ?></li>
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
                                    <th><?php echo e(__('Capacidad')); ?></th>
                                    <th><?php echo e(__('Acciones')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $amenidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($amenidad->name); ?></td>
                                        <td><?php echo e($amenidad->description); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="50">
                                        </td>
                                        <td><?php echo e($amenidad->ability); ?></td>
                                        <td>
                                            
                                            <a data-bs-toggle="tooltip" title="<?php echo e(__('Reservar')); ?>" href="<?php echo e(route('reservas.create', $amenidad->id)); ?>" class="btn btn-sm btn-primary"><i class="ti ti-pencil text-white"></i></a>
                                        </td>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/reservas/index.blade.php ENDPATH**/ ?>