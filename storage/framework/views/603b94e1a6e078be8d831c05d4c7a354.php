
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Editar Amenidad')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('amenidades.index')); ?>"><?php echo e(__('Lista de Amenidades')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Editar Amenidad')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($amenidad, ['route' => ['amenidades.update', $amenidad->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('name', __('Nombre de la Amenidad'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Ingrese el nombre')])); ?>

                        </div>
                        <div class="form-group">
                             <?php echo e(Form::label('status', __('Estado'), ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('description', __('Descripción'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la descripción')])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('Foto Actual', __('Foto actual'), ['class' => 'form-label'])); ?>

                            <br>
                            <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="500" class="form-label">
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('photo', __('Foto de la Amenidad'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::file('photo', ['class' => 'form-control'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('ability', __('Capacidad'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::number('ability', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la capacidad')])); ?>

                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Actualizar')); ?></button>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/edit.blade.php ENDPATH**/ ?>