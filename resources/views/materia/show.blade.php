@extends('layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Materia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materias.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombremateria:</strong>
                            {{ $materia->nombremateria }}
                        </div>
                        <div class="form-group">
                            <strong>Grado Id:</strong>
                            {{ $materia->grado_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
