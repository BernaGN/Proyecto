@extends('adminlte::page')

@section('title', 'Habilidades')

@section('content_header')
    {{ Breadcrumbs::render('habilidad.store') }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Habilidad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('habilidades.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Catalogos.habilidad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
