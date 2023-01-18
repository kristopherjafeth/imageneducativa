<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre de la Medida') }}
            {{ Form::text('nombremedida', $medida->nombremedida, ['class' => 'form-control' . ($errors->has('nombremedida') ? ' is-invalid' : ''), 'placeholder' => 'Nombremedida']) }}
            {!! $errors->first('nombremedida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>