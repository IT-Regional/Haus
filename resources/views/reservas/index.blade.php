@extends('layouts.admin')
@section('page-title')
    {{ __('Reservar Amenidades') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Reservar Amenidad') }}</li>
@endsection

@section('action-btn')
    <div class="float-end">
        <a href="{{ route('amenidades.calendar') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            title="Calendar View">
            <i class="ti ti-calendar text-white"></i>
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach ($amenidades as $amenidad)
            <div class="col-md-4 col-sm-4">
                <div class="card hover-shadow-lg">
                    <div class="card-body user-card text-center client-box" style="height: 260px !important">
                        <div class="avatar-parent-child">
                            <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="200" class="avatar avatar-lg"
                                height="100">
                        </div>
                        <div class="h6 mt-4 mb-0">
                            {{ $amenidad->name }}
                        </div>
                        <br>
                        @if ($amenidad->status == 1)
                            <button class="btn btn-sm btn-secondary" disabled>{{ __('Reservada') }}</button>
                        @else
                            <a data-bs-toggle="tooltip" title="{{ __('Reservar') }}"
                                href="{{ route('reservas.create', $amenidad->id) }}"
                                class="btn btn-sm btn-primary">{{ __('Reservar') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
