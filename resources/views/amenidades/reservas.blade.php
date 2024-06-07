@extends('layouts.admin')
@section('page-title')
    {{ __('Crear amenidades') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Reservas') }}</li>
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
                                    <th>{{ __('Fecha de reserva') }}</th>
                                    <th>{{ __('Hora de inicio') }}</th>
                                    <th>{{ __('Hora de Fin') }}</th>
                                    <th>{{ __('Amenidad') }}</th>
                                    <th>{{ __('Detalles') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->fecha_reserva }}</td>
                                        <td>{{ $reserva->start_time }}</td>
                                        <td>{{ $reserva->end_time }}</td>
                                        <td>
                                            <img src="{{ asset($reserva->amenidad->photo) }}" alt="Foto" width="50">
                                        </td>
                                        <td>
                                            <a href="{{ route('amenidades.show', $reserva->id) }}"
                                                class="btn btn-info">{{ __('Detalle') }}</a>
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
