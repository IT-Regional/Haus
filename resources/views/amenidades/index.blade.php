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
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="{{ route('amenidades.create') }}" data-bs-whatever="{{ __('Crear Amenidad') }}"
            data-bs-original-title="{{ __('Create New Lead') }}">
            <i data-bs-toggle="tooltip" title="{{ __('Crear Amenidad') }}" class="ti ti-plus text-white"></i>
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
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection