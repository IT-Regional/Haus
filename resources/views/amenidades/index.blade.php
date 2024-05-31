@extends('layouts.admin')
@section('page-title')
    {{__('Crear amenidades')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Crear Amenidad')}}</li>
@endsection

@section('action-btn')
    <div class="float-end">
        <a href="{{ route('amenidades.calendar') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            title="Calendar View">
            <i class="ti ti-calendar text-white"></i>
        </a>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="{{ route('amenidades.create') }}" data-bs-whatever="{{ __('Crear Amenidad') }}"
            data-bs-original-title="{{ __('Create New Lead') }}">
            <i data-bs-toggle="tooltip" title="{{ __('Crear Amenidad') }}" class="ti ti-plus text-white"></i>
        </a>
        <a href="{{route('amenidades.export')}}" class="btn btn-sm btn-primary btn-icon m-1" data-title="{{__('Export item CSV file')}}"
         data-bs-toggle="tooltip" data-bs-original-title="{{__('Export')}}">
            <i class="ti ti-file-export"></i>
        </a>
    </div>
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
                                    <th>{{__('Estado')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($amenidades as $amenidad)
                                    <tr>
                                        <td>{{ $amenidad->name }}</td>
                                         <td>
                                            <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="50">
                                        </td>
                                        <td>{{ $amenidad->ability }}</td>
                                        <td>{{ $amenidad->status ? __('Reservada') : __('Disponible') }}</td>
                                        <td>
                                            <a data-bs-toggle="tooltip" title="{{__('Editar')}}" href="{{ route('amenidades.edit', $amenidad->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil text-white"></i></a>
                                            <form action="{{ route('amenidades.destroy', $amenidad->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta amenidad?');">{{ __('Eliminar') }}</button>
                                            </form>
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