<form action="<?php echo e(route('amenidades.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('name', __('Nombre de la Amenidad'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Ingrese el nombre')])); ?>

                </div>
            </div>
            <div class="col-md-12">
                <?php echo e(Form::label('description', __('Descripcion'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la descripción')])); ?>

            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('status', __('Estado'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('photo', __('Foto'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::file('photo', ['class' => 'form-control'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('ability', __('Capacidad'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('ability', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la capacidad')])); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('is_paid', __('¿Es de pago?'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::checkbox('is_paid', true, false, ['id' => 'is_paid'])); ?>

            </div>
            <div class="form-group" id="cost_field" style="display:none;">
                <?php echo e(Form::label('cost', __('Costo'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('cost', null, ['class' => 'form-control', 'step' => '0.01'])); ?>

            </div>
            <div class="col-md-12">
                <label><?php echo e(__('Horarios')); ?></label>
                <div id="horarios-wrapper">
                    <div class="row horario-item">
                        <div class="col-md-6">
                            <?php echo e(Form::label('horarios[0][start_time]', __('Hora de inicio'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::time('horarios[0][start_time]', null, ['class' => 'form-control'])); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo e(Form::label('horarios[0][end_time]', __('Hora de fin'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::time('horarios[0][end_time]', null, ['class' => 'form-control'])); ?>

                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-horario"><?php echo e(__('Agregar horario')); ?></button>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<script>
    document.getElementById('add-horario').addEventListener('click', function() {
        var wrapper = document.getElementById('horarios-wrapper');
        var index = wrapper.children.length;
        var newHorario = document.createElement('div');
        newHorario.classList.add('row', 'horario-item');
        newHorario.innerHTML = `
            <div class="col-md-6">
                <label for="horarios[` + index + `][start_time]" class="form-label"><?php echo e(__('Hora de inicio')); ?></label>
                <input type="time" name="horarios[` + index + `][start_time]" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="horarios[` + index + `][end_time]" class="form-label"><?php echo e(__('Hora de fin')); ?></label>
                <input type="time" name="horarios[` + index + `][end_time]" class="form-control">
            </div>
        `;
        wrapper.appendChild(newHorario);
    });
    document.getElementById('is_paid').addEventListener('change', function() {
        document.getElementById('cost_field').style.display = this.checked ? 'block' : 'none';
    });
</script>
<?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/create.blade.php ENDPATH**/ ?>