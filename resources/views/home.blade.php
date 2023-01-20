@extends('layouts.app')

@section('content')
@php
use App\Models\Order;
 $pedidosData = Order::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at", date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
@endphp
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Panel de Control</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <a href="/clientes" style="text-decoration: none; color: #fff;">
                                <div class="col-lg-3 col-xs-12">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">

                                            <h5>Clientes</h5>
                                            @php
                                            use App\Models\Cliente;
                                            $cant_usuarios = Cliente::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="#" class="text-white">Ver más</a>
                                            </p>


                                        </div>
                                    </div>

                                </div>
                            </a>
                            <a href="/productos" style="text-decoration: none; color: #fff!important;">
                                <div class="col-lg-3 col-xs-12">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <a href="/productos">
                                                <h5 style="text-decoration: none;  color: #fff!important;">Productos</h5>
                                                @php
                                                use App\Models\Producto;
                                                $cant_roles = Producto::count();
                                                @endphp
                                                <h2 class="text-right" style="text-decoration: none;  color: #fff!important;"><i class="fa fa-box f-left" style="text-decoration: none; color: #fff!important;"></i><span>{{ $cant_roles }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/productos" class="text-white" style="text-decoration: none; color: #fff!important;">Ver más</a>
                                                </p>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/usuarios" style="text-decoration: none; color: #fff!important;">

                                <div class="col-lg-3 col-xs-12">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            @php
                                            use App\Models\User;
                                            $cant_blogs = User::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $cant_blogs }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="/pedidos" style="text-decoration: none; color: #fff!important;">

                                <div class="col-lg-3 col-xs-12">
                                    <div class="card naranja  order-card">
                                        <div class="card-block">
                                            <h5>Pedidos</h5>
                                            @php
                                            $cant_blogs = Order::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa-solid fas fa-shopping-cart f-left"></i></i><span>{{ $cant_blogs }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/pedidos" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/carpetas" style="text-decoration: none; color: #fff!important;">


                                <div class="col-lg-3 col-xs-12">
                                    <div class="card morado  order-card">
                                        <div class="card-block">
                                            <h5>Carpetas</h5>
                                            @php
                                            use App\Models\Carpeta;
                                            $cant_blogs = Carpeta::count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa-solid fas fa-folder f-left"></i></i><span>{{ $cant_blogs }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/carpetas" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/pedidos" style="text-decoration: none; color: #fff!important;">

                                <div class="col-lg-3 col-xs-12">
                                    <div class="card rojo  order-card">
                                        <div class="card-block">
                                            <h5>Pedidos Pendientes</h5>
                                            @php
                                            $cant_blogs = Order::where('estado', 'EN PROCESO')->count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa-solid fas fa-file f-left"></i></i><span>{{ $cant_blogs }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/pedidos" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                            <a href="/pedidos" style="text-decoration: none; color: #fff!important;">

                                <div class="col-lg-3 col-xs-12">
                                    <div class="card verde  order-card">
                                        <div class="card-block">
                                            <h5>Pedidos Completados</h5>
                                            @php
                                            $cant_blogs = Order::where('estado', 'COMPLETADO')->count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa-solid fas fa-check f-left"></i></i><span>{{ $cant_blogs }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/pedidos" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="/pedidos" style="text-decoration: none; color: #fff!important;">

                                <div class="col-lg-3 col-xs-12">
                                    <div class="card negro  order-card">
                                        <div class="card-block">
                                            <h5>Pedidos Cancelados</h5>
                                            @php
                                            $cant_blogs = Order::where('estado', 'CANCELADO')->count();
                                            @endphp
                                            <h2 class="text-right"><i class="fa-solid fas fa-times-circle f-left"></i></i><span>{{ $cant_blogs }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/pedidos" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body">

                            <div id="container"></div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script>
    var userData = <?php echo json_encode($pedidosData) ?>;
    Highcharts.chart('container', {
        chart: {
        type: 'column'
    },
        title: {
            text: "Pedidos"
        },
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
        yAxis: {
            title: {
                text: "Total de Pedidos "
            }
        },
        series: [{
            name: "Pedidos",
            data: userData
        }],
    });
</script>

@endsection
