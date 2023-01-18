@extends('layouts.app')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Medida</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('medidas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('medida.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
