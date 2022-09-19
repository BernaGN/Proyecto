@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    {{ Breadcrumbs::render('categoria.update', $categoria) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Categoria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Catalogos.categoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
