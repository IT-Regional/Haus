@extends('layouts.admin')

@section('page-title')
    {{ __('Verificación de Pago') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('reservas.index') }}">{{ __('Lista de amenidades') }}</a></li>
    <li class="breadcrumb-item">{{ __('Verificación de Pago') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Verificación de Pago para la Amenidad:') }} {{ $amenidad->name }}</h4>
                    <p>{{ __('Costo:') }} ${{ number_format($amenidad->cost, 2) }}</p>

                    <!-- Aquí se integrará el formulario de pago con tu proveedor de pagos -->
                    <form action="{{ route('reservas.procesar_pago') }}" method="POST">
                        @csrf
                        <input type="hidden" name="amenidad_id" value="{{ $amenidad->id }}">
                        <input type="hidden" name="fecha_reserva" value="{{ $fecha_reserva }}">
                        <input type="hidden" name="start_time" value="{{ $start_time }}">
                        <input type="hidden" name="end_time" value="{{ $end_time }}">

                        <!-- Aquí iría la integración con el proveedor de pagos -->

                        <button type="submit" class="btn btn-primary">{{ __('Pagar y Reservar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
