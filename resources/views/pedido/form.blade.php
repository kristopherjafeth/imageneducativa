<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                    {{ Form::select('cliente_id', $clientes, $pedido->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Cliente']) }}
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('Carpeta') }}
                    {{ Form::select('carpeta_id', $carpetas, $pedido->carpeta_id, ['class' => 'form-control' . ($errors->has('carpeta_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Carpeta']) }}
                    {!! $errors->first('carpeta_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('Medidas') }}
                    {{ Form::select('medida_id', $medidas, $pedido->medida_id, ['class' => 'form-control' . ($errors->has('medida_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Medida']) }}
                    {!! $errors->first('medida_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color_id', $colores, $pedido->color_id, ['class' => 'form-control' . ($errors->has('color_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar un Color']) }}
                    {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {{ Form::label('Cantidad de Carpetas') }}
                    {{ Form::number('cantidadcarpeta', $pedido->cantidadcarpeta, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {{ Form::label('Cantidad de Medallas') }}
                    {{ Form::number('cantidadmedalla', $pedido->cantidadmedalla, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>



            <div class="col-2">
                <div class="form-group">
                    {{ Form::label('Fecha de Entrega') }}
                    <input type="date" name="fechaentrega" id="fechaentrega" class="form-control">
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('estado') }}
                    <select name="estado" id="" class="form-control">
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="EN PROCESO">EN PROCESO</option>
                        <option value="CANCELADO">CANCELADO</option>
                        <option value="COMPLETADO">COMPLETADO</option>


                    </select>
                </div>
            </div>
            <div class="col-12">
                <h4 for="productos">Otros</h4>
            </div>

            <table class="table table-bordered" id="table">
                <tr>
                    <th style="color: #fff;
                    background-color: #0a3d5e;">
                        Producto
                    </th>
                    <th style="color: #fff;
                    background-color: #0a3d5e;">Cantidad</th>
                    <th style="color: #fff;
                    background-color: #0a3d5e;">
                        Agregar</th>
                </tr>
                <tr>
                    <td style="width: 33%;">
                        <select name="producto_id[]" id="productos" placeholder="Seleccionar productos"
                            class="form-control" optional>
                            @foreach ($productos as $id => $producto)
                                <option value="{{ $id }}">{{ $producto }}</option>
                            @endforeach
                        </select>

                    </td>

                    <td style="width: 33%;">
                        <input type="number" name="cantidadproducto[]" class="form-control"
                            placeholder="Ingresar cantidad">

                    </td>
                    <td style="width: 33%;">
                        <button class="btn btn-success" name="add" id="add" type="button"
                            style="width: 100%;">Añadir otro</button>

                    </td>
                </tr>
            </table>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
