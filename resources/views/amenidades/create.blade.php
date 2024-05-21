<form action="{{route('amenidades.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('name',__('Nombre de la Amenidad'),['class'=>'form-label'])}}
                        {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Ingrese el nombre')))}}
                    </div>
                </div>
                <div class="col-md-12">
                    {{Form::label('description',__('Descripcion'),['class'=>'form-label'])}}
                    {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ingrese la descripción')))}}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('status', __('Estado'), ['class' => 'col-form-label']) }}
                    {{ Form::select('status', [0 => 'No Reservada', 1 => 'Reservada'], null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('photo', __('Foto'), ['class' => 'col-form-label']) }}
                    {{ Form::file('photo', ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{Form::label('ability',__('Capacidad'),['class'=>'form-label'])}}
                    {{Form::number('ability',null,array('class'=>'form-control','placeholder'=>__('Ingrese la capacidad')))}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form>