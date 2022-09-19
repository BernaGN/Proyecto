@extends('layouts.plantilla')


@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('permiso.show', $permission) }}
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Permiso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permisos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $permission->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $permission->description }}
                        </div>
                        <div class="form-group">
                            <strong>Guard Name:</strong>
                            {{ $permission->guard_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
