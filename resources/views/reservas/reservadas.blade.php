@extends('layouts.admin')
@section('page-title')
    {{ __('Mis Reservas') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Mis Reservas') }}</li>
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
                                    <th>{{ __('Nombre de la Amenidad') }}</th>
                                    <th>{{ __('Fecha de Reserva') }}</th>
                                    <th>{{ __('Foto') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->amenidad->name }}</td>
                                        <td>{{ $reserva->fecha_reserva }}</td>
                                        <td>
                                            <img src="{{ asset($reserva->amenidad->photo) }}" alt="Foto" width="150">
                                        </td>
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
