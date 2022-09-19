@extends('layouts.plantilla')


@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@endsection


@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{ Breadcrumbs::render('permiso.store') }}

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Permiso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('permisos.store') }}" role="form"
                            enctype="multipart/form-data" id="formulario">
                            @csrf

                            @include('Catalogos.permission.form')

                            <div class="box-footer mt20">
                                <button type="button" class="btn btn-primary btn-sm mt-2" role="dialog"
                                    data-bs-toggle="modal" data-bs-target="#confirm-agregar">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.confirm-agregar')
@endsection


@section('js')
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('js/submit.js') }}"></script>
@endsection
