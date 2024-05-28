
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Reservar Amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reservar Amenidad')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $amenidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-4">
            <div class="card hover-shadow-lg">
                    <div class="card-body user-card text-center client-box" style="height: 260px !important">
                    <div class="avatar-parent-child">
                        <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="200" class="avatar avatar-lg" height="100">
                    </div>
                    <div class="h6 mt-4 mb-0">
                        <?php echo e($amenidad->name); ?>

                    </div>
                    <br>
                    <a data-bs-toggle="tooltip" title="<?php echo e(__('Reservar')); ?>" href="<?php echo e(route('reservas.create', $amenidad->id)); ?>" class="btn btn-sm btn-primary">Reservar</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ha\main-file\resources\views/reservas/index.blade.php ENDPATH**/ ?>