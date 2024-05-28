
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Amenidades')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xxl-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-primary">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                            <h6 class="mb-3"><?php echo e(__('Amenidades Ingresadas')); ?></h6>
                                            <h3 class="mb-0">
                                                <?php echo e($totalAmenidades); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-success">
                                                <i class="ti ti-trash"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                            <h6 class="mb-3"><?php echo e(__('Amenidades Disponibles')); ?></h6>
                                            <h3 class="mb-0">
                                                <?php echo e($amenidadesDisponibles); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-danger">
                                                <i class="ti ti-trash"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                            <h6 class="mb-3"><?php echo e(__('Amenidades Reservadas')); ?></h6>
                                            <h3 class="mb-0">
                                                <?php echo e($amenidadesReservadas); ?>

                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ha\main-file\resources\views/amenidades/dashboard.blade.php ENDPATH**/ ?>