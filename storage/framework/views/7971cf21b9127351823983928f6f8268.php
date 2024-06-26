

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
                    <?php echo e(Form::open(['route' => 'reservas.store'])); ?>

                    <?php echo e(Form::hidden('amenidad_id', $amenidad->id)); ?>

                    <div class="form-group">
                        <br>
                        <img src="<?php echo e(asset($amenidad->photo)); ?>" alt="Foto" width="500" class="form-label">
                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('fecha_reserva', __('Fecha de Reserva'), ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::date('fecha_reserva', $fechaSeleccionada, ['class' => 'form-control', 'required' => 'required', 'id' => 'fecha_reserva'])); ?>

                    </div>
                    <div class="form-group">
                        <p><?php echo e(__('Costo:')); ?>

                            <?php echo e($amenidad->is_paid ? 'De pago - $' . number_format($amenidad->cost, 2) : 'Gratis'); ?></p>
                    </div>
                    <div class="form-group">
                        <label for="horarios" class="col-form-label"><?php echo e(__('Seleccione Horario')); ?></label>
                        <div class="row">
                            <?php $__currentLoopData = $horariosDisponibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <?php if($horario->disponible): ?>
                                                <label>
                                                    <input type="radio" name="horario"
                                                        value="<?php echo e($horario->start_time); ?>|<?php echo e($horario->end_time); ?>"
                                                        required>
                                                    <h5 class="card-title">
                                                        <?php echo e(\Carbon\Carbon::parse($horario->start_time)->format('h:i a')); ?>

                                                        -
                                                        <?php echo e(\Carbon\Carbon::parse($horario->end_time)->format('h:i a')); ?>

                                                    </h5>
                                                    <p class="card-text">Capacidad: <?php echo e($amenidad->ability); ?> Personas</p>
                                                </label>
                                            <?php else: ?>
                                                <label class="text-muted">
                                                    <input type="radio" name="horario"
                                                        value="<?php echo e($horario->start_time); ?>|<?php echo e($horario->end_time); ?>"
                                                        disabled>
                                                    <h5 class="card-title">
                                                        <?php echo e(\Carbon\Carbon::parse($horario->start_time)->format('h:i a')); ?>

                                                        -
                                                        <?php echo e(\Carbon\Carbon::parse($horario->end_time)->format('h:i a')); ?>

                                                    </h5>
                                                    <p class="card-text">Capacidad: <?php echo e($amenidad->ability); ?> Personas</p>
                                                    <p class="text-danger"><?php echo e(__('Reservado')); ?></p>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
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

<?php $__env->startPush('scripts'); ?>
    <script>
        document.getElementById('fecha_reserva').addEventListener('change', function() {
            const fecha = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('fecha', fecha);
            window.location.href = url.toString();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\main-file\resources\views/reservas/create.blade.php ENDPATH**/ ?>