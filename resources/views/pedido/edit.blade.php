@extends('layouts.app')


@section('content')

    <section class="container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Pedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : '' }}">
                                        Cliente
                                            {{ Form::select('cliente_id', $clientes, $pedido->cliente_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grado']) }}
                                            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                        
                                    
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('customer_name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cliente_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                       Estado
                                        <select name="estado" id="" class="form-control" value="{{ $pedido->estado }}">
                                            <option value="PENDIENTE" {{ old('estado', $pedido->estado) == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                                            <option value="EN PROCESO" {{ old('estado', $pedido->estado) == 'EN PROCESO' ? 'selected' : '' }}>EN PROCESO</option>
                                            <option value="CANCELADO" {{ old('estado', $pedido->estado) == 'CANCELADO' ? 'selected' : '' }}>CANCELADO</option>
                                            <option value="COMPLETADO" {{ old('estado', $pedido->estado) == 'COMPLETADO' ? 'selected' : '' }}>COMPLETADO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('fechaentrega') ? 'has-error' : '' }}">
                                        Fecha de Entrega
                                        <input type="date" name="fechaentrega" class="form-control" value="{{ $pedido->fechaentrega }}"
                                            required>
                                        @if ($errors->has('fechaentrega'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('fechaentrega') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('carpeta_id') ? 'has-error' : '' }}">
                                        Carpetas
                                        {{ Form::select('carpeta_id', $carpetas, $pedido->carpeta_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grado']) }}
                                        {!! $errors->first('carpeta_id', '<div class="invalid-feedback">:message</div>') !!}
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('carpeta_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('carpeta_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('color_id') ? 'has-error' : '' }}">
                                        Colores
                                        {{ Form::select('color_id', $colores, $pedido->color_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grado']) }}
                                        {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('color_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('color_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="col-6">
                                    <div class="form-group {{ $errors->has('medida_id') ? 'has-error' : '' }}">
                                        Medidas
                                        {{ Form::select('medida_id', $medidas, $pedido->medida_id, ['class' => 'form-control' . ($errors->has('grado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grado']) }}
                                        {!! $errors->first('medida_id', '<div class="invalid-feedback">:message</div>') !!}
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('medida_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('medida_id') }}
                                            </em>
                                        @endif
                                    </div>
                        
                                </div>
                        
                                <div class="col-6">
                                    <div class="form-group  {{ $errors->has('cantidadmedalla') ? 'has-error' : '' }}">
                                        Cantidad de Medallas
                                        {{ Form::text('cantidadmedalla', $pedido->cantidadmedalla, ['class' => 'form-control' . ($errors->has('nombremateria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Materia']) }}
                                {!! $errors->first('cantidadmedalla', '<div class="invalid-feedback">:message</div>') !!}
                        
                                        @if ($errors->has('cantidadmedalla'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cantidadmedalla') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group  {{ $errors->has('cantidadcarpeta') ? 'has-error' : '' }}">
                                        Cantidad de Carpeta
                                        {{ Form::text('cantidadcarpeta', $pedido->cantidadcarpeta, ['class' => 'form-control' . ($errors->has('nombremateria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la Materia']) }}
                                        {!! $errors->first('cantidadcarpeta', '<div class="invalid-feedback">:message</div>') !!}
                        
                                        @if ($errors->has('cantidadcarpeta'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cantidadcarpeta') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="col-12">


                                    <div class="card-body">
                                        <table class="table" id="products_table">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>
                                                        <a class="btn btn-sm btn-success addRow" href="javascript:;">+
                                                            Agregar otro</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($otrosproductos as $key =>$item)

                                                <tr> 
                                                   
                                                    <td>  {{ ++$key }}</td> 
                                                                                               
                                                    <td>
                                                        <select name="producto_id[{{ $key }}]" class="form-control">
                                                            <option value="">-- Escoger producto --</option>
                                                         
                                                         
                                                            <option value="{{ $item->producto_id }}" selected>
                                                                {{ $item->producto->nombre }}
                                                            </option>    
                                                       
                                                        </select>
                                                    </td>
                                               
                                                    <td>
                                                        <input type="number" name="quantity[{{ $key }}]" id="quantity"
                                                            class="form-control" value="{{ $item->quantity }}"/>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:;" class="btn btn-sm btn-danger deleteRow">-
                                                            Eliminar</a>
                                                    </td>

                                                 
                                                </tr>
                                                @endforeach



                                            </tbody>
                                        </table>

                                        <div class="row">


                                            <div class="col-md-12">
                                                <input class="btn btn-sm"
                                                    style="float: right; color: #fff; background: rgb(52, 160, 52); width: 30%; padding: 10px; align-content: right;"
                                                    type="submit" value="Guardar">

                                            </div>
                                        </div>
                                    </div>



                                </div>

                        
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

@endsection

@section('css')
<script src="https://cdn.tailwindcss.com"></script>

@endsection

@section('scripts')



<script>
    $('thead').on('click', '.addRow', function() {

        var tr = 
        '<tr>'+
            '<td>{{ ++$key }}</td>  '+ 
                '<td>'+
                    '<select name="producto_id[]" class="form-control">'+
                        '<option value="">-- Escoger producto --</option>'+
                                '@foreach ($productos as $producto)'+
                                 '<option value="{{ $producto->id }}"> {{ $producto->nombre }}</option>'+   
                                 ' @endforeach'+
                    '</select>'+
                '</td>'+
                '<td><input type="number" name="quantity[]" id="quantity" class="form-control"/></td>'+
                '<td><a href="javascript:;" class="btn btn-sm btn-danger deleteRow">- Eliminar</a></td>'+
            '</tr>';

            $('tbody').append(tr);
        
        
        });
        $('tbody').on('click', '.deleteRow', function(){
            $(this).parent().parent().remove();
        });
</script>

@endsection