
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Editar Amenidad')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('amenidades.index')); ?>"><?php echo e(__('Lista de Amenidades')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Editar Amenidad admin')); ?></li>
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
                    <div class="form-group">
                        <?php echo e(Form::label('is_paid', __('¿Es de pago?'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::checkbox('is_paid', true, $amenidad->is_paid, ['id' => 'is_paid'])); ?>

                    </div>
                    <div class="form-group" id="cost_field" style="<?php echo e($amenidad->is_paid ? 'display:block;' : 'display:none;'); ?>">
                        <?php echo e(Form::label('cost', __('Costo'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number('cost', $amenidad->cost, ['class' => 'form-control', 'step' => '0.01'])); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('horarios', __('Horarios'), ['class' => 'form-label'])); ?>

                        <div id="horarios-container">
                            <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row horario-row">
                                    <div class="col-md-5">
                                        <?php echo e(Form::label("horarios[$index][start_time]", __('Hora de Inicio'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::time("horarios[$index][start_time]", \Carbon\Carbon::parse($horario->start_time)->format('H:i'), ['class' => 'form-control', 'required' => 'required'])); ?>

                                    </div>
                                    <div class="col-md-5">
                                        <?php echo e(Form::label("horarios[$index][end_time]", __('Hora de Fin'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::time("horarios[$index][end_time]", \Carbon\Carbon::parse($horario->end_time)->format('H:i'), ['class' => 'form-control', 'required' => 'required'])); ?>

                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-horario"><?php echo e(__('Eliminar')); ?></button>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button type="button" class="btn btn-secondary" id="add-horario"><?php echo e(__('Agregar Horario')); ?></button>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Actualizar')); ?></button>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-horario').addEventListener('click', function() {
                const container = document.getElementById('horarios-container');
                const index = container.querySelectorAll('.horario-row').length;
                const row = document.createElement('div');
                row.classList.add('row', 'horario-row');
                row.innerHTML = `
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Hora de Inicio')); ?></label>
                    <input type="time" name="horarios[${index}][start_time]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Hora de Fin')); ?></label>
                    <input type="time" name="horarios[${index}][end_time]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-horario"><?php echo e(__('Eliminar')); ?></button>
                </div>
            `;
                container.appendChild(row);
            });

            document.getElementById('horarios-container').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-horario')) {
                    e.target.closest('.horario-row').remove();
                }
            });
        });

        document.getElementById('is_paid').addEventListener('change', function() {
            document.getElementById('cost_field').style.display = this.checked ? 'block' : 'none';
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/edit.blade.php ENDPATH**/ ?>