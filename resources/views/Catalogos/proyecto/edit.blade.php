@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    {{ Breadcrumbs::render('proyecto.update', $proyecto) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Proyecto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proyectos.update', $proyecto->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Procesos.proyecto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
