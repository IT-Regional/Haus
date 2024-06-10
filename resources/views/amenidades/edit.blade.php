@extends('layouts.admin')
@section('page-title')
    {{ __('Editar Amenidad') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('amenidades.index') }}">{{ __('Lista de Amenidades') }}</a></li>
    <li class="breadcrumb-item">{{ __('Editar Amenidad admin') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($amenidad, ['route' => ['amenidades.update', $amenidad->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{ Form::label('name', __('Nombre de la Amenidad'), ['class' => 'form-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Ingrese el nombre')]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', __('Estado'), ['class' => 'col-form-label']) }}
                        {{ Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', __('Descripción'), ['class' => 'form-label']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la descripción')]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Foto Actual', __('Foto actual'), ['class' => 'form-label']) }}
                        <br>
                        <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="500" class="form-label">
                    </div>
                    <div class="form-group">
                        {{ Form::label('photo', __('Foto de la Amenidad'), ['class' => 'form-label']) }}
                        {{ Form::file('photo', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('ability', __('Capacidad'), ['class' => 'form-label']) }}
                        {{ Form::number('ability', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la capacidad')]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('is_paid', __('¿Es de pago?'), ['class' => 'form-label']) }}
                        {{ Form::checkbox('is_paid', true, $amenidad->is_paid, ['id' => 'is_paid']) }}
                    </div>
                    <div class="form-group" id="cost_field"
                        style="{{ $amenidad->is_paid ? 'display:block;' : 'display:none;' }}">
                        {{ Form::label('cost', __('Costo'), ['class' => 'form-label']) }}
                        {{ Form::number('cost', $amenidad->cost, ['class' => 'form-control', 'step' => '0.01']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('horarios', __('Horarios'), ['class' => 'form-label']) }}
                        <div id="horarios-container">
                            @foreach ($horarios as $index => $horario)
                                <div class="row horario-row">
                                    <div class="col-md-5">
                                        {{ Form::label("horarios[$index][start_time]", __('Hora de Inicio'), ['class' => 'form-label']) }}
                                        {{ Form::time("horarios[$index][start_time]", \Carbon\Carbon::parse($horario->start_time)->format('H:i'), ['class' => 'form-control', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-5">
                                        {{ Form::label("horarios[$index][end_time]", __('Hora de Fin'), ['class' => 'form-label']) }}
                                        {{ Form::time("horarios[$index][end_time]", \Carbon\Carbon::parse($horario->end_time)->format('H:i'), ['class' => 'form-control', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"
                                            class="btn btn-danger remove-horario">{{ __('Eliminar') }}</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-secondary"
                            id="add-horario">{{ __('Agregar Horario') }}</button>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                    {{ Form::close() }}
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
                    <label class="form-label">{{ __('Hora de Inicio') }}</label>
                    <input type="time" name="horarios[${index}][start_time]" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">{{ __('Hora de Fin') }}</label>
                    <input type="time" name="horarios[${index}][end_time]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-horario">{{ __('Eliminar') }}</button>
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
@endsection
