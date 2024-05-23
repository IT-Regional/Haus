@extends('layouts.admin')
@section('page-title')
    {{__('Reservar Amenidades')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Reservar Amenidad')}}</li>
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
                                    <th>{{__('Capacidad')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($amenidades as $amenidad)
                                    <tr>
                                        <td>{{ $amenidad->name }}</td>
                                        <td>{{ $amenidad->description }}</td>
                                        <td>
                                            <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="50">
                                        </td>
                                        <td>{{ $amenidad->ability }}</td>
                                        <td>
                                            {{-- <a href="{{ route('reservas.create', $amenidad->id) }}">Reservar {{ $amenidad->nombre }}</a> --}}
                                            <a data-bs-toggle="tooltip" title="{{__('Reservar')}}" href="{{ route('reservas.create', $amenidad->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil text-white"></i></a>
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
