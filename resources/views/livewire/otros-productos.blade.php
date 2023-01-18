

        <div class="row">
            <div class="col-6">
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
            <div class="col-6">
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
            <div class="col-6">
                <div class="form-group {{ $errors->has('fechaentrega') ? 'has-error' : '' }}">
                    Fecha de Entrega
                    <input type="date" name="fechaentrega" class="form-control" value="{{ old('fechaentrega') }}"
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
            <div class="col-6">
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

            <div class="col-6">
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

            <div class="col-6">
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
            <div class="col-6">
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


        </div>


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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderProducts as $index => $orderProduct)
                            <tr>
                                <td>
                                    <select name="orderProducts[{{ $index }}][product_id]"
                                        wire:model="orderProducts.{{ $index }}.product_id" class="form-control">
                                        <option value="">-- Escoger producto --</option>
                                        @foreach ($allProducts as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="orderProducts[{{ $index }}][quantity]"
                                        class="form-control" wire:model="orderProducts.{{ $index }}.quantity" />
                                </td>
                                <td>
                                    <a href="#" wire:click.prevent="removeProduct({{ $index }})"
                                        class="btn btn-sm btn-danger"> - Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" wire:click.prevent="addProduct">
                            + Agregar otro producto</button>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div>
            <input class="btn btn-primary" type="submit" value="Save Order">
        </div>

