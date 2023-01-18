@extends('layouts.app')

@section('template_title')
Pedido
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Pedidos</h3>
    </div>
    <div class="section-body">


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">


                                <div class="float-right">
                                    <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                        {{ __('CREAR NUEVO') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead class="thead">
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>

                                            <th>Carpeta</th>
                                            <th>Otros</th>
                                            <th>Entrega</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->cliente->nombre }}</td>

                                            <td>
                                                @if($pedido->carpeta === NULL)
                                                NINGUNO
                                                @else
                                                {{ $pedido->carpeta->nombrecarpeta }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($pedido->medida_id === NULL)
                                                NINGUNO
                                                @else
                                                {{ $pedido->medida->nombremedida }}
                                                @endif
                                            </td>




                                            <td>
                                                {{ $pedido->fechaentrega }}

                                            </td>
                                            <td>

                                                @if ($pedido->estado == 'COMPLETADO')
                                                <a href="#" class="btn btn-success"> {{ $pedido->estado }}</a>
                                                @endif

                                                @if ($pedido->estado == 'PENDIENTE')
                                                <a href="#" class="btn btn-danger"> {{ $pedido->estado }}</a>
                                                @endif

                                                @if ($pedido->estado == 'EN PROCESO')
                                                <a href="#" class="btn btn-info"> {{ $pedido->estado }}</a>
                                                @endif
                                                @if ($pedido->estado == 'CANCELADO')
                                                <a href="#" class="btn btn-secondary"> {{ $pedido->estado }}</a>
                                                @endif


                                            </td>


                                            <td>

                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="formulario-eliminar">

                                                    @can('ver-pedido')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pedido.pdf', $pedido->id) }}"><i class="fa fa-fw fa-print"></i>IMPRIMIR</a>
                                                    @endcan
                                                 

                                                    @can('ver-pedido')
                                                    <a class="btn btn-sm btn-info " href="{{ route('pedidos.show', $pedido->id) }}"><i class="fa fa-fw fa-eye"></i>VER</a>
                                                    @endcan
                                                    @can('editar-pedido')
                                                    <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit', $pedido->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-pedido')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                    @endcan

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>


    </div>
</section>
@endsection
@section('css')
<style>
    div.container {
        max-width: 1200px
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('scripts')
<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Estas seguro?',
            text: "No puedes revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        var table = $('#tabla').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },


        });
    });
</script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
@endsection