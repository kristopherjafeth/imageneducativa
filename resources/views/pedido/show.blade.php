@extends('layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-xs-12">
                                <img class="navbar-brand-full p-5" src="{{ asset('img/encabezado.png') }}" width="324rem"
                                    alt="" />
                            </div>
                            <div class="col-lg-4 col-xs-12">

                                <div class="row">
                                    <div class="col-12 p-2"
                                        style="background: #0a3d5e; color: #fff; font-weight: 600; text-align:center; border-radius:10px 10px 0px 0px;">
                                        <div class="titulofecha">
                                            FECHA
                                        </div>
                                    </div>
                                    <div class="col-4"
                                        style="display: flex; flex-direction: column; text-align:center; color:black; border: solid #000 1px; border-radius: 0px 0px 0px 10px;">
                                        <label for="dia" style="font-weight: 700;">DIA</label>
                                        {{ $dfecha }}
                                    </div>
                                    <div class="col-4"
                                        style="display: flex; flex-direction: column; text-align:center; color:black; border: solid #000 1px; border-radius: 0px 0px 0px 0px;">
                                        <label for="mes" style="font-weight: 700;">MES</label>
                                        {{ $mfecha }}
                                    </div>
                                    <div class="col-4"
                                        style="display: flex; flex-direction: column; text-align:center; color:black; border: solid #000 1px; border-radius: 0px 0px 10px 0px;">
                                        <label for="a??o" style="font-weight: 700;">A??O</label>
                                        {{ $afecha }}
                                    </div>
                                </div>

                                <div class="row pt-5">
                                    <div class="col-12 p-2"
                                        style="background: #5e0a0a; color: #fff; font-weight: 600; text-align:center; border-radius:10px 10px 0px 0px;">
                                        <div class="titulofecha">
                                            Remision
                                        </div>
                                    </div>
                                    <div class="col-8 p-2"
                                        style="display: flex; font-size: 20px; text-align:center; color:black; border: solid #000 1px; border-radius: 0px 0px 0px 10px;">

                                        <strong>N?? DE PEDIDO: </strong>



                                    </div>
                                    <div class="col-4 p-2"
                                        style="display: flex; font-size: 20px; text-align:center; color:black; border-right: solid #000 1px; border-top: solid #000 1px; border-bottom: solid #000 1px;border-radius: 0px 0px 10px 0px;">
                                        <div style="text-align: right;"> <strong> {{ $pedido->id }} </strong></div>
                                    </div>

                                </div>


                            </div>



                        </div>
                       
                            <div class="infocliente"
                                style="border: solid #000 1px; border-radius: 10px; padding:10px; margin-top:2rem; color:#000;">
                                <div class="row">
                                 
                                @foreach ($clientesvista as $cliente)
                                
                                    <div class="col-lg-4 col-xs-12 pt-2 pb-2">
                                        <strong> Se??ores:</strong> {{ $cliente->nombre }}
                                    </div>
                                    <div class="col-lg-4 col-xs-12 pt-2 pb-2">
                                        <strong> NIT: </strong> {{ $cliente->identificacion }}
                                    </div>

                                    <div class="col-lg-4 col-xs-12 pb-2 pb-2">
                                        <strong> Direcci??n: </strong>{{ $cliente->direccion }}
                                    </div>
                                    <div class="col-lg-4 col-xs-12 pb-2 pb-2">
                                        <strong> Telefono: </strong> {{ $cliente->telefono }}
                                    </div>
                                    <div class="col-lg-4 col-xs-12pb-2 pb-2">
                                        <strong> Correo: </strong> {{ $cliente->email }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                     

                        <div class="cuerpopedido p-5" style="color:#000;">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Carpeta:</strong>
                                        @if($pedido->carpeta === NULL)
                                        NINGUNO
                                         @else
                                         {{ $pedido->carpeta->nombrecarpeta }}
                                        @endif
                                       
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Medida:</strong>
                                        @if($pedido->medida === NULL)
                                        NINGUNO
                                         @else
                                         {{ $pedido->medida->nombremedida }}
                                        @endif
                                      
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Color:</strong>
                                        @if($pedido->color === NULL)
                                        NINGUNO
                                         @else
                                         {{ $pedido->color->nombrecolor }}
                                        @endif
                              
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Cantidad de Medallas:</strong>
                                  
                                        @if($pedido->cantidadmedalla === NULL)
                                        NINGUNO
                                         @else
                                         {{ $pedido->cantidadmedalla }}
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Cantidad de Carpetas:</strong>
                                        @if($pedido->cantidadcarpeta === NULL)
                                        NINGUNO
                                         @else
                                         {{ $pedido->cantidadcarpeta }}
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h5 style="color: #000; font-size: 15px;">OTROS PRODUCTOS</h5>
                            <div class="col-12">
                                <div class="form-group">

                                    <table class="table">
                                        <thead class="thead" style="background-color: #fff!important;">
                                            <tr>
                                                <th style="color: #000;">
                                                    Producto
                                                </th>
                                                <th style="color: #000;">
                                                    Cantidad
                                                </th>
                                            </tr>
                                            <tr>
                                                @foreach ($otros as $otro)
                                                    <td>
                                                       {{ $otro->producto->nombre }}
                                                    </td>
                                                    <td>
                                                        {{ $otro->quantity }}
                                                    </td>
                                            </tr>
                                            @endforeach
                                        </thead>
                                    </table>



                                </div>
                            </div>
                        </div>


                        <div class="row " style="text-align: center; color:#000; padding-top: 550px;">
                            <div class="col-6">
                                <div
                                    style=" border-bottom: solid #000 1px; width:80%; text-align:center;     margin-left: 10%;">
                                </div>
                                <h5 style="padding-top:15px;">Jaime Large Machi</h5>
                                <h6 style="padding-top:15px;">Director Ventas</h6>
                                <p style="padding-top:15px;">CC. 12.556.025</p>
                            </div>
                            <div class="col-6">
                                <div style=" border-bottom: solid #000 1px; width:80%;     margin-left: 10%;">

                                </div>
                                <h5 style="padding-top:15px;">Recibido</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
