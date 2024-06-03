@extends('layouts.admin')
@section('page-title')
    {{ __('Reservar Amenidad') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">{{ __('Lista de amenidades') }}</a></li>
    <li class="breadcrumb-item">{{ __('Reservar Amenidad') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Reservar Amenidad:') }} {{ $amenidad->name }}</h4>
                    {{ Form::open(['route' => ['reservas.store', $amenidad->id]]) }}
                    {{ Form::hidden('amenidad_id', $amenidad->id) }}
                    <div class="form-group">
                        <br>
                        <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="500" class="form-label">
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_reserva', __('Fecha de Reserva'), ['class' => 'col-form-label']) }}
                        {{ Form::date('fecha_reserva', $fechaSeleccionada, ['class' => 'form-control', 'required' => 'required', 'id' => 'fecha_reserva']) }}
                    </div>
                    <div class="form-group">
                        <label for="horarios" class="col-form-label">{{ __('Seleccione Horario') }}</label>
                        <div class="row">
                            @foreach ($horariosDisponibles as $horario)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <label>
                                                <input type="radio" name="horario"
                                                    value="{{ $horario->start_time }}|{{ $horario->end_time }}" required>
                                                <h5 class="card-title">
                                                    {{ \Carbon\Carbon::parse($horario->start_time)->format('h:i a') }} -
                                                    {{ \Carbon\Carbon::parse($horario->end_time)->format('h:i a') }}
                                                </h5>
                                                <p class="card-text">Capacidad: {{ $amenidad->ability }} Personas</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('reservas.index') }}" class="btn btn-light">{{ __('Cancelar') }}</a>
                        {{ Form::submit(__('Reservar'), ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('fecha_reserva').addEventListener('change', function() {
            const fecha = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('fecha', fecha);
            window.location.href = url.toString();
        });
    </script>
@endpush
