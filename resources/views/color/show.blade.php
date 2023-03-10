@extends('layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Color</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('colors.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrecolor:</strong>
                            {{ $color->nombrecolor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
