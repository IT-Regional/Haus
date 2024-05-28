@extends('layouts.admin')
@section('page-title')
<<<<<<< HEAD
    {{__('Mis Reservas')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Mis Reservas')}}</li>
=======
    {{ __('Mis Amenidades') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Amenidades') }}</a></li>
    <li class="breadcrumb-item">{{ __('Amenidades Reservadas') }}</li>
>>>>>>> f7864a1d9c4c0a3b16f6c8111c84815b83b30d57
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
<<<<<<< HEAD
                                    <th>{{__('Nombre de la Amenidad')}}</th>
                                    <th>{{__('Fecha de Reserva')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->amenidad->name }}</td>
                                        <td>{{ $reserva->fecha_reserva }}</td>
=======
                                    <th>{{ __('Nombre de la Amenidad') }}</th>
                                    <th>{{ __('Fecha de Reserva') }}</th>
                                    <th>{{ __('Foto') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->amenidad->name }}</td>
                                        <td>{{ $reserva->fecha_reserva }}</td>
                                        <td>
                                            <img src="{{ asset($reserva->amenidad->photo) }}" alt="Foto" width="150">
                                        </td>
>>>>>>> f7864a1d9c4c0a3b16f6c8111c84815b83b30d57
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
