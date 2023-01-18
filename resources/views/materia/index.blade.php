@extends('layouts.app')

@section('template_title')
    Materia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">


                             <div class="float-right">
                                <a href="{{ route('materias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th style="color: #fff;">Nombre</th>
										<th style="color: #fff;">Grado</th>
                                        <th style="color: #fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            
											<td>{{ $materia->nombremateria }}</td>
											<td>{{ $materia->grado->nombregrado }}</td>

                                            <td>
                                                <form action="{{ route('materias.destroy',$materia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('materias.show',$materia->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('materias.edit',$materia->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $materias->links() !!}
            </div>
        </div>
    </div>
@endsection
