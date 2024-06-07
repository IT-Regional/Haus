@extends('layouts.admin')

@section('page-title')
    {{ __('Detalles de la Amenidad Reservada') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">{{ __('Reservas') }}</a></li>
    <li class="breadcrumb-item">{{ __('Detalles') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Fecha de Reserva') }}</label>
                        <p>{{ $reserva->fecha_reserva }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Hora de Inicio') }}</label>
                        <p>{{ $reserva->start_time }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Hora de Fin') }}</label>
                        <p>{{ $reserva->end_time }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Amenidad') }}</label>
                        <p>{{ $reserva->amenidad->name }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Descripción') }}</label>
                        <p>{{ $reserva->amenidad->description }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Capacidad') }}</label>
                        <p>{{ $reserva->amenidad->ability }}</p>
                    </div>
                    <div class="form-grouo">
                        <label>{{__('Residente')}}</label>
                        <p>{{$reserva->user->name}}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Foto de la Amenidad') }}</label>
                        <br>
                        <img src="{{ asset($reserva->amenidad->photo) }}" alt="Foto" width="500">
                    </div>
                    <a href="{{ route('reservas.index') }}" class="btn btn-primary">{{ __('Volver a Reservas') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
