@extends('layouts.admin')
@section('page-title')
    {{__('Amenidades')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Amenidades')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xxl-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-primary">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2">{{__('Total')}}</p>
                                            <h6 class="mb-3">{{__('Amenidades Ingresadas')}}</h6>
                                            <h3 class="mb-0">
                                                {{ $totalAmenidades }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-success">
                                                <i class="ti ti-trash"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2">{{__('Total')}}</p>
                                            <h6 class="mb-3">{{__('Amenidades Disponibles')}}</h6>
                                            <h3 class="mb-0">
                                                {{ $amenidadesDisponibles }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                             <div class="theme-avtar bg-danger">
                                                <i class="ti ti-trash"></i>
                                            </div>
                                            <p class="text-muted text-sm mt-4 mb-2">{{__('Total')}}</p>
                                            <h6 class="mb-3">{{__('Amenidades Reservadas')}}</h6>
                                            <h3 class="mb-0">
                                                {{ $amenidadesReservadas }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection