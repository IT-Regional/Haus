<form action="<?php echo e(route('amenidades.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo e(Form::label('name',__('Nombre de la Amenidad'),['class'=>'form-label'])); ?>

                        <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Ingrese el nombre')))); ?>

                    </div>
                </div>
                <div class="col-md-12">
                    <?php echo e(Form::label('description',__('Descripcion'),['class'=>'form-label'])); ?>

                    <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ingrese la descripción')))); ?>

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
                    <?php echo e(Form::label('ability',__('Capacidad'),['class'=>'form-label'])); ?>

                    <?php echo e(Form::number('ability',null,array('class'=>'form-control','placeholder'=>__('Ingrese la capacidad')))); ?>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form><?php /**PATH C:\xampp\htdocs\main-file\resources\views/amenidades/create.blade.php ENDPATH**/ ?>