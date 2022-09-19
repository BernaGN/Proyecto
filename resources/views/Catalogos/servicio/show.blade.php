@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    {{ Breadcrumbs::render('servicio.show', $servicio) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="form-group">
                                <strong>id:</strong>
                                {{ $servicio->id }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $servicio->informacion->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $servicio->informacion->descripcion }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha de creacion:</strong>
                                {{ $servicio->created_at }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha de modificacion:</strong>
                                {{ $servicio->updated_at }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@stop
