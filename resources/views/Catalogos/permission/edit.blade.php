@extends('layouts.plantilla')


@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{ Breadcrumbs::render('permiso.show', $permission) }}

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Permiso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('permisos.update', $permission->id) }}" role="form"
                            enctype="multipart/form-data" id="formulario">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Catalogos.permission.form')

                            <div class="box-footer mt20">
                                <button type="button" class="btn btn-primary btn-sm mt-2" role="dialog"
                                    data-bs-toggle="modal" data-bs-target="#confirm-editar">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.confirm-editar')
@endsection
