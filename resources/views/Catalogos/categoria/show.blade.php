@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    {{ Breadcrumbs::render('categoria.show', $categoria) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>id:</strong>
                            {{ $categoria->id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->informacion->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->informacion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de creacion:</strong>
                            {{ $categoria->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de modificacion:</strong>
                            {{ $categoria->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
