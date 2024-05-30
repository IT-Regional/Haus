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
                            {{ Form::date('fecha_reserva', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('start_time', __('Hora de Inicio'), ['class' => 'col-form-label']) }}
                            <select name="start_time" class="form-control" required>
                                @foreach($horarios as $horario)
                                    <option value="{{ $horario->start_time }}">{{ $horario->start_time }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{ Form::label('end_time', __('Hora de Fin'), ['class' => 'col-form-label']) }}
                            <select name="end_time" class="form-control" required>
                                @foreach($horarios as $horario)
                                    <option value="{{ $horario->end_time }}">{{ $horario->end_time }}</option>
                                @endforeach
                            </select>
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
