
<div class="form-group {!! $errors->has($name) ? 'has-error' : '' !!}">
    {!! Form::label($name, null, ['class' => 'control-label']) !!}
    {!! Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
    <span class="text-danger">{!! $errors->has($name) ? $errors->first($name) : '' !!}</span>
</div>