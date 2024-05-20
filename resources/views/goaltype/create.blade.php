<div class=" bg-none card-box">
    {{Form::open(array('url'=>'goaltype','method'=>'post'))}}
    @php 
    $plansettings = App\Models\Utility::plansettings();
@endphp
<div class="row">
   @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
     <div class="text-end">
            <a href="#" data-size="lg" data-ajax-popup-over="true" data-url="{{ route('generate',['Goal Type']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate') }}" float-end>
                <span class="btn btn-primary btn-sm"> <i class="fas fa-robot">  {{ __('Generate With AI') }}</span></i>
            </a>
     </div>
     @endif
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('name',__('Name'),['class' => 'col-form-label'])}}
                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Goal Type Name')))}}
                @error('name')
                <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
            {{Form::submit(__('Create'),array('class'=>'btn  btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
</div>
