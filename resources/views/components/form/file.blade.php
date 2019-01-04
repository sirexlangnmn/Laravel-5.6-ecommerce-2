{{-- photo on this table --}}
<div class="form-group {!! $errors->has($name) ? 'has-error' : '' !!}">
    {!! Form::label($name, null, ['class'=>'control-label']) !!}
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput">
                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                <span class="fileinput-filename"></span>
            </div>
            <span class="input-group-addon btn btn-default btn-file"> 
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            {!! Form::file($name, ['id'=>'product_image', 'class'=>'custom-file-input']) !!}
            </span>
            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
            <div id="thumb-output"></div>
        </div>
        <span class="text-danger">{!! $errors->has($name) ? $errors->first($name) : '' !!}</span>
</div>