@extends('layouts.app')

@section('template_title')
    Grado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">


                             <div class="float-right">
                                <a href="{{ route('grados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                             <table class="display responsive " width="100%" id="tabla">
                                <thead class="thead" style="background: #0a3d5e;">
                                    <tr>
                                        
										<th style="color: #fff;">Nombregrado</th>

                                        <th style="color: #fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grados as $grado)
                                        <tr>
                                            
											<td>{{ $grado->nombregrado }}</td>

                                            <td>
                                                <form action="{{ route('grados.destroy',$grado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grados.show',$grado->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grados.edit',$grado->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grados->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        div.container {
            max-width: 1200px
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#tabla').DataTable({
                responsive: true,
                paging: false,
          
                language: {
        "decimal": "",
        "emptyTable": "No hay informaci??n",
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

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
@endsection