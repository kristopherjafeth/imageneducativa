<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-xl-6 col-xs-12">
                <div class="form-group">
                    {{ Form::label('Nombre Completo') }}
                    {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-xl-6 col-xs-12">
                <div class="form-group">
                    {{ Form::label('NIT o RUC') }}
                    {{ Form::text('identificacion', $cliente->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
                    {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>  
            </div>
            <div class="col-xl-4 col-xs-12">
                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-xl-4 col-xs-12">
                <div class="form-group">
                    {{ Form::label('telefono') }}
                    {{ Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-xl-4 col-xs-12">
                <div class="form-group">
                    {{ Form::label('Correo') }}
                    {{ Form::email('email', $cliente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    
    </div>
    <div class="box-footer mt20" style="    float: right;">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
