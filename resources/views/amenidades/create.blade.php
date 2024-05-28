<form action="{{ route('amenidades.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('name', __('Nombre de la Amenidad'), ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Ingrese el nombre')]) }}
                </div>
            </div>
            <div class="col-md-12">
                {{ Form::label('description', __('Descripcion'), ['class' => 'form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la descripción')]) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('status', __('Estado'), ['class' => 'col-form-label']) }}
                {{ Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('photo', __('Foto'), ['class' => 'col-form-label']) }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
            </div>
            <div class="col-md-6">
                {{ Form::label('ability', __('Capacidad'), ['class' => 'form-label']) }}
                {{ Form::number('ability', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la capacidad')]) }}
            </div>
            <div class="col-md-12">
                <label>{{ __('Horarios') }}</label>
                <div id="horarios-wrapper">
                    <div class="row horario-item">
                        <div class="col-md-6">
                            {{ Form::label('horarios[0][start_time]', __('Hora de inicio'), ['class' => 'form-label']) }}
                            {{ Form::time('horarios[0][start_time]', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('horarios[0][end_time]', __('Hora de fin'), ['class' => 'form-label']) }}
                            {{ Form::time('horarios[0][end_time]', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-horario">{{ __('Agregar horario') }}</button>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<script>
    document.getElementById('add-horario').addEventListener('click', function () {
        var wrapper = document.getElementById('horarios-wrapper');
        var index = wrapper.children.length;
        var newHorario = document.createElement('div');
        newHorario.classList.add('row', 'horario-item');
        newHorario.innerHTML = `
            <div class="col-md-6">
                <label for="horarios[` + index + `][start_time]" class="form-label">{{ __('Hora de inicio') }}</label>
                <input type="time" name="horarios[` + index + `][start_time]" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="horarios[` + index + `][end_time]" class="form-label">{{ __('Hora de fin') }}</label>
                <input type="time" name="horarios[` + index + `][end_time]" class="form-control">
            </div>
        `;
        wrapper.appendChild(newHorario);
    });
</script>
