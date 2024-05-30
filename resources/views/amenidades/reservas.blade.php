@extends('layouts.admin')
@section('page-title')
    {{__('Crear amenidades')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Reservas')}}</li>
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
                                    <th>{{__('Nombre')}}</th>
                                    <th>{{__('Descripcion')}}</th>
                                    <th>{{__('Foto')}}</th>
                                    <th>{{__('Fecha de reserva')}}</th>
                                    <th>{{__('Hora de inicio')}}</th>
                                    <th>{{__('Hora de fin')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->amenidad->name}}</td>
                                        <td>{{ $reserva->user->name }}</td>
                                        <td>{{ $reserva->amenidad->photo }}</td>
                                        <td>{{ $reserva->fecha_reserva }}</td>
                                        <td>{{ $reserva->start_time }}</td>
                                        <td>{{ $reserva->end_time }}</td>
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