@extends('layouts.admin')
@section('page-title')
    {{__('Reservar Amenidad')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('reservas.index')}}">{{__('Lista de amenidades')}}</a></li>
    <li class="breadcrumb-item">{{__('Reservar Amenidad')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Reservar Amenidad:') }} {{ $amenidad_id->name }}</h4>
                    {{ Form::open(['route' => ['reservas.store', $amenidad_id->id]]) }}
                        {{ Form::hidden('amenidad_id', $amenidad_id->id) }}
                        <div class="form-group">
                            <br>
                            <img src="{{ asset($amenidad_id->photo) }}" alt="Foto" width="500" class="form-label">
                        </div>
                        <div class="form-group">
                            {{ Form::label('fecha_reserva', __('Fecha de Reserva'), ['class' => 'col-form-label']) }}
                            {{ Form::date('fecha_reserva', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) }}
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
