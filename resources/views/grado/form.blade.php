<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombregrado') }}
            {{ Form::text('nombregrado', $grado->nombregrado, ['class' => 'form-control' . ($errors->has('nombregrado') ? ' is-invalid' : ''), 'placeholder' => 'Nombregrado']) }}
            {!! $errors->first('nombregrado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>