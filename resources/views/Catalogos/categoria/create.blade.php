@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    {{ Breadcrumbs::render('categoria.store') }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Categoria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Catalogos.categoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
