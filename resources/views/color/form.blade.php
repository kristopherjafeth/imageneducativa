<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombrecolor') }}
            {{ Form::text('nombrecolor', $color->nombrecolor, ['class' => 'form-control' . ($errors->has('nombrecolor') ? ' is-invalid' : ''), 'placeholder' => 'Nombrecolor']) }}
            {!! $errors->first('nombrecolor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>