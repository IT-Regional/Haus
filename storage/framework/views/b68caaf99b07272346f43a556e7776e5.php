
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Crear amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Crear Amenidad')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('amenidades.create')); ?>" data-bs-whatever="<?php echo e(__('Crear Amenidad')); ?>"
            data-bs-original-title="<?php echo e(__('Create New Lead')); ?>">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('Crear Amenidad')); ?>" class="ti ti-plus text-white"></i>
        </a>
    </div>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/index.blade.php ENDPATH**/ ?>