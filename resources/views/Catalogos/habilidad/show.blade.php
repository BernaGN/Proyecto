@extends('adminlte::page')

@section('title', 'Habilidades')

@section('content_header')
    {{ Breadcrumbs::render('habilidad.show', $habilidad) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Habilidade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('habilidades.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $habilidad->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
