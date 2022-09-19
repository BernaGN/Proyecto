@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    {{ Breadcrumbs::render('servicio.update', $servicio) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('servicios.update', $servicio->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Catalogos.servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
