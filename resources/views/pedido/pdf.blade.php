<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>REMISION # {{ $pedido->id }}</title>
</head>

<body>
    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col" style=" border: 0px;"> <img src="{{ public_path('img/encabezado.png') }}"
                        alt="" width="200px">
                </th>
                <th scope="col" style="display: flex; flex-direction:column; border:1px solid #000; text-align:center;">
                    <div style="color: rgb(6, 6, 6);">
                        Fecha de entrega:
                    </div>
                    {{ $now->format('d-m-Y / g:i a') }}
                    <div style="font-size: 18px; color:rgb(0, 0, 0); ">
                        REMISION: {{ $pedido->id }}
                    </div>

                </th>

            </tr>
        </thead>

    </table>

    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col" style="font-size:14px; border:1px solid #000;">CLIENTE:</th>
                @foreach ($clientes as $cliente)
                <th scope="col" style="font-weight: 400; font-size:14px; border:1px solid #000;">{{ $cliente->nombre }}</th>
                @endforeach
                <th scope="col" style="font-size:14px; border:1px solid #000;">NIT:</th>
                @foreach ($clientes as $cliente)
                <th scope="col" style="font-weight: 400; font-size:14px; border:1px solid #000;">{{ $cliente->identificacion }}</th>
                @endforeach
                
            </tr>
        </thead>
        <thead class="thead">
            <tr>
            <th scope="col" style="font-size:14px; border:1px solid #000;">CORREO:</th>
                @foreach ($clientes as $cliente)
                <th scope="col" style="font-weight: 400; font-size:14px; border:1px solid #000;">@if($cliente->email === NULL)
                    NO POSEE CORREO
                     @else
                     {{ $cliente->email}}
                    @endif</th>
                    <th scope="col" style="font-size:14px; border-top:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #fff;"></th>
                    <th scope="col" style="font-size:14px; border-top:1px solid #000; border-bottom:1px solid #000;  border-right:1px solid #000;"></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td style="font-weight: 600;   font-family: 'poppins', sans-serif; font-size:14px; border:1px solid #000;">DIRECCION:</td>
                    <td style="font-weight: 400;   font-family: 'poppins', sans-serif; font-size:14px; border:1px solid #000; ">{{ $cliente->direccion }}</td>
                    <td style="font-weight: 600;   font-family: 'poppins', sans-serif; font-size:14px; border:1px solid #000; ">TELEFONO:</td>
                    <td style="font-weight: 400;   font-family: 'poppins', sans-serif; font-size:14px; border:1px solid #000; ">{{ $cliente->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table" >
        <thead class="thead">
            <tr>
                <th scope="col" style="font-size:14px; border:1px solid #000;">CARPETA</th>
                <th scope="col" style="font-size:14px; border:1px solid #000;">MEDIDA</th>
                <th scope="col" style="font-size:14px; border:1px solid #000;">COLOR</th>
                <th scope="col" style="font-size:14px; border:1px solid #000;">CANTIDAD MEDALLA</th>
                <th scope="col" style="font-size:14px; border:1px solid #000;">CANTIDAD CARPETA</th>
            </tr>
        </thead>
        <tbody style="border-top: 0px; border-bottom: 0px;">

            <tr>


                <td style="font-size:14px; border:1px solid #000;">   @if($pedido->carpeta === NULL)
                    NINGUNO
                     @else
                     {{ $pedido->carpeta->nombrecarpeta }}
                    @endif</td>
                <td style="font-size:14px; border:1px solid #000;"> @if($pedido->medida_id === NULL)
                    NINGUNO
                     @else
                     {{ $pedido->medida->nombremedida }}
                    @endif</td>
                <td style="font-size:14px; border:1px solid #000;">@if($pedido->color_id === NULL)
                    NINGUNO
                     @else
                     {{ $pedido->color->nombrecolor }}
                    @endif
                </td>
                <td style="font-size:14px; border:1px solid #000;">
                    @if($pedido->cantidadmedalla === NULL)
                    NINGUNO
                     @else
                     {{ $pedido->cantidadmedalla }}
                    @endif
                </td>
                <td style="font-size:14px; border:1px solid #000;">   @if($pedido->cantidadcarpeta === NULL)
                    NINGUNO
                     @else
                     {{ $pedido->cantidadcarpeta }}
                    @endif
                </td>
            </tr>

        </tbody>
    </table>



    <H5 style="color: #000; font-size:17px;"">
        OTROS
    </H5>

                <table class="table">
                    <thead class="thead" style="background-color: #fff!important;">
                        <tr>
                            <th style="color: #000; font-size:15px; border:1px solid #000;">
                                Producto
                            </th>
                            <th style="color: #000; font-size:15px; border:1px solid #000;">
                                Cantidad
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($otros as $otro)
                        <tr>
                        
                                <td style="font-size:14px;">
                                    {{ $otro->producto->nombre }}
                                </td>
                                <td style="font-size:14px;">
                                    {{ $otro->quantity }}
                                </td>
                                
                        </tr>
                        @endforeach
                    </tbody>
                </table>




    </table>

    <table class="table" style="position: absolute; bottom: 250px; border-top: 0px; border-bottom: 0px;">
        <thead class="thead" style="border-top: 0px; border-bottom: 0px;">
            <tr>
                <td scope="col" style="padding-top: 40px; text-align: left;">
                
                    <h5 style="color:black;">Jaime Large Machi</h5>
                    <h6 style="color:black;">Director Ventas</h6>
                    <p style="color:black;">CC. 12.556.025</p>
                </td>

                <td scope="col" style="text-align: center; align-content: center; align-items: center;">
                  
                        <h5 style="color:black; padding: 50px;">Recibido</h5>
                </td>

            </tr>
        </thead>
        <tbody>
            <tr>
            
                <td  style="font-size:12px;">Generado por el Sistema de Imagen Educativa - {{ $now->format('d-m-Y / g:i a') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
