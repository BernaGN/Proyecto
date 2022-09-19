@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    {{ Breadcrumbs::render('cliente.show', $cliente) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cliente.show', $cliente) }}
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
