<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('nombrecarpeta', $carpeta->nombrecarpeta, ['class' => 'form-control' . ($errors->has('nombrecarpeta') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombrecarpeta', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
         
        </div>
      
  

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>