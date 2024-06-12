
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Crear amenidades')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Crear Amenidad')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <a href="<?php echo e(route('amenidades.calendar')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            title="Calendar View">
            <i class="ti ti-calendar text-white"></i>
        </a>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('amenidades.create')); ?>" data-bs-whatever="<?php echo e(__('Crear Amenidad')); ?>"
            data-bs-original-title="<?php echo e(__('Create New Lead')); ?>">
            <i data-bs-toggle="tooltip" title="<?php echo e(__('Crear Amenidad')); ?>" class="ti ti-plus text-white"></i>
        </a>
        <a href="<?php echo e(route('export.daily')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-title="<?php echo e(__('Export item CSV file')); ?>" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Export')); ?>">
            <i class="ti ti-file-export"></i>
        </a>
        <a href="<?php echo e(route('export.weekly')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-title="<?php echo e(__('Export item CSV file')); ?>" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Export')); ?>">
            <i class="ti ti-file-export"></i>
        </a>
        <a href="<?php echo e(route('export.monthly')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-title="<?php echo e(__('Export item CSV file')); ?>" data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(__('Export')); ?>">
            <i class="ti ti-file-export"></i>
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
                                    <th><?php echo e(__('Foto')); ?></th>
                                    <th><?php echo e(__('Capacidad')); ?></th>
                                    <th><?php echo e(__('Estado')); ?></th>
                                    <th><?php echo e(__('Acciones')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $amenidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($amenidad->name); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="50">
                                        </td>
                                        <td><?php echo e($amenidad->ability); ?></td>
                                        <td><?php echo e($amenidad->status ? __('Reservada') : __('Disponible')); ?></td>
                                        <td>
                                            <a data-bs-toggle="tooltip" title="<?php echo e(__('Editar')); ?>"
                                                href="<?php echo e(route('amenidades.edit', $amenidad->id)); ?>"
                                                class="btn btn-sm btn-primary"><i class="ti ti-pencil text-white"></i></a>
                                            <form action="<?php echo e(route('amenidades.destroy', $amenidad->id)); ?>" method="POST"
                                                style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta amenidad?');"><?php echo e(__('Eliminar')); ?></button>
                                            </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\main-file\main-file\resources\views/amenidades/index.blade.php ENDPATH**/ ?>