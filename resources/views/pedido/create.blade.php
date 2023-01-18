@extends('layouts.app')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Pedido</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            @csrf
                            {{-- <livewire:otros-productos />  --}}

                            <div class="row">
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : '' }}">
                                        Cliente
                                        <select name="cliente_id" id="" class="form-control">
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('customer_name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cliente_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                        Estado
                                        <select name="estado" id="" class="form-control">
                                            <option value="PENDIENTE">PENDIENTE</option>
                                            <option value="EN PROCESO">EN PROCESO</option>
                                            <option value="CANCELADO">CANCELADO</option>
                                            <option value="COMPLETADO">COMPLETADO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('fechaentrega') ? 'has-error' : '' }}">
                                        Fecha de Entrega
                                        <input type="date" name="fechaentrega" class="form-control"
                                            value="{{ old('fechaentrega') }}" required>
                                        @if ($errors->has('fechaentrega'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('fechaentrega') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('carpeta_id') ? 'has-error' : '' }}">
                                        Carpetas
                                        <select name="carpeta_id" id="" class="form-control">
                                            @foreach ($carpetas as $carpeta)
                                                <option value="{{ $carpeta->id }}">{{ $carpeta->nombrecarpeta }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('carpeta_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('carpeta_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('color_id') ? 'has-error' : '' }}">
                                        Colores
                                        <select name="color_id" id="" class="form-control">
                                            @foreach ($colores as $color)
                                                <option value="{{ $color->id }}">{{ $color->nombrecolor }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('color_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('color_id') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('medida_id') ? 'has-error' : '' }}">
                                        Medidas
                                        <select name="medida_id" id="" class="form-control">
                                            @foreach ($medidas as $medida)
                                                <option value="{{ $medida->id }}">{{ $medida->nombremedida }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" name="cliente_id" class="form-control"
                                           value="{{ old('cliente_id') }}" required> --}}
                                        @if ($errors->has('medida_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('medida_id') }}
                                            </em>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group  {{ $errors->has('cantidadmedalla') ? 'has-error' : '' }}">
                                        Cantidad de Medallas
                                        <input type="number" name="cantidadmedalla" class="form-control"
                                            value="{{ old('cantidadmedalla') }}">

                                        @if ($errors->has('cantidadmedalla'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cantidadmedalla') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-xs-12">
                                    <div class="form-group  {{ $errors->has('cantidadcarpeta') ? 'has-error' : '' }}">
                                        Cantidad de Carpeta
                                        <input type="number" name="cantidadcarpeta" class="form-control"
                                            value="{{ old('cantidadcarpeta') }}">

                                        @if ($errors->has('cantidadcarpeta'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cantidadcarpeta') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Otros
                                        </div>

                                        <div class="card-body">
                                            <table class="table" id="products_table">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>
                                                            <a class="btn btn-sm btn-success addRow" href="javascript:;">+
                                                                Agregar otro</button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select name="producto_id[]" class="form-control" required>
                                                                <option value="">-- Escoger producto --</option>
                                                                @foreach ($productos as $producto)
                                                                <option value="{{ $producto->id }}">
                                                                    {{ $producto->nombre }}
                                                                </option>   
                                                                @endforeach
                                                              

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity[]" id="quantity"
                                                                class="form-control" required/>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-danger deleteRow">-
                                                                Eliminar</a>
                                                        </td>
                                                    </tr>



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
        </div>




    </section>
@endsection

@section('scripts')
    {{-- 
<script>
    var i = 0;
    $('#add').click(function() {
        ++i;
        $('#table').append(

    `<tr>
        <td>
            <select name="producto_id[`+i+`]" id="productos" placeholder="Seleccionar productos"
                            class="form-control" optional>
                            @foreach ($productos as $id => $producto)
                                <option value="{{ $id }}">{{ $producto }}</option>
                            @endforeach
            </select>
            </td>
        
        <td style="width: 33%;">
          <input type="number" name="cantidadproducto[`+i+`]"  class="form-control" placeholder="Ingresar cantidad">
        </td>
        <td>
            <button class="btn btn-danger remove-table-row" type="button" style="width: 100%;">Eliminar</button>
        </td>

        </tr>`);
        
    });

    $(document).on('click','.remove-table-row', function(){
        $(this).parents('tr').remove();
    })
</script> --}}



    <script>
        $('thead').on('click', '.addRow', function() {

            var tr = 
            '<tr>'+
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
