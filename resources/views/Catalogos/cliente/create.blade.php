@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    {{ Breadcrumbs::render('cliente.index') }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cliente.store') }}

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Cliente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Catalogos.cliente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
