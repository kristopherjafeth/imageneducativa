<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre de la Materia') }}
            {{ Form::text('nombremateria', $materia->nombremateria, ['class' => 'form-control' . ($errors->has('nombremateria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Materia']) }}
            {!! $errors->first('nombremateria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Grado') }}
            {{ Form::select('grado_id', $grados, $materia->grado_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grado']) }}
            {!! $errors->first('grado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>