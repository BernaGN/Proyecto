@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    {{ Breadcrumbs::render('etiqueta.update', $etiqueta) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Etiqueta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etiquetas.update', $etiqueta->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Catalogos.etiqueta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
