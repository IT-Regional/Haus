@extends('layouts.admin')
@section('page-title')
    {{__('Editar Amenidad')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('amenidades.index')}}">{{__('Lista de Amenidades')}}</a></li>
    <li class="breadcrumb-item">{{__('Editar Amenidad')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($amenidad, ['route' => ['amenidades.update', $amenidad->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::label('name', __('Nombre de la Amenidad'), ['class' => 'form-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Ingrese el nombre')]) }}
                        </div>
                        <div class="form-group">
                             {{ Form::label('status', __('Estado'), ['class' => 'col-form-label']) }}
                            {{ Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', __('Descripción'), ['class' => 'form-label']) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la descripción')]) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('Foto Actual', __('Foto actual'), ['class' => 'form-label'])}}
                            <br>
                            <img src="{{ asset($amenidad->photo) }}" alt="Foto" width="500" class="form-label">
                        </div>
                        <div class="form-group">
                            {{ Form::label('photo', __('Foto de la Amenidad'), ['class' => 'form-label']) }}
                            {{ Form::file('photo', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ability', __('Capacidad'), ['class' => 'form-label']) }}
                            {{ Form::number('ability', null, ['class' => 'form-control', 'placeholder' => __('Ingrese la capacidad')]) }}
                        </div>
                        <button type="submit" class="btn btn-primary">{{__('Actualizar')}}</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection