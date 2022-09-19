@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    {{ Breadcrumbs::render('proyecto.show', $proyecto) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Proyecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>id:</strong>
                            {{ $proyecto->id }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $proyecto->cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proyecto->informacion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proyecto->informacion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de creacion:</strong>
                            {{ $proyecto->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de modificacion:</strong>
                            {{ $proyecto->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
@stop
