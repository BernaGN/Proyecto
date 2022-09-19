@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    {{ Breadcrumbs::render('users.index') }}
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <x-layouts.header title="Usuarios" message="Agregar" route="usuarios" icon="fas fa-users" />
                <div class="card-body">
                    <x-layouts.buscador route="usuarios" :buscar="$buscar" :activo="$activo" show="true" />
                    <x-tables.table :headers="['ID', 'Nombre', 'Email', 'Rol', 'Fecha de Creación', 'Estado', 'Acciones']" id="usuarios">
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <x-tables.td :key="true">{{ $usuario->id }}</x-tables.td>
                                <x-tables.td>{{ $usuario->fullName }}</x-tables.td>
                                <x-tables.td>{{ $usuario->email }}</x-tables.td>
                                <x-tables.td>{{ $usuario->roles->first()->name }}</x-tables.td>
                                <x-tables.td>{{ $usuario->created_at->diffForHumans() }}</x-tables.td>
                                <x-tables.td>
                                    @if ($usuario->deleted_at != null)
                                        <span class="badge badge-pill badge-danger">Inactivo</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Activo</span>
                                    @endif
                                </x-tables.td>
                                <x-tables.td>
                                    <x-buttons.dropdown-eliminar :value="$usuario" route="usuarios" :viewId="false">
                                        <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#cambiar-contraseña" data-id="{{ $usuario->id }}">
                                            <i class="fas fa-exchange-alt"></i> Cambiar Contraseña
                                        </a>
                                    </x-buttons.dropdown-eliminar>
                                </x-tables.td>
                            </tr>
                        @empty
                            <x-layouts.vacio />
                        @endforelse
                    </x-tables.table>
                    {{ $usuarios->appends(['buscar' => $buscar, 'activo' => $activo])->links() }}
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

    <!-- Modal -->
    <x-modals.confirm text="Editar" />
    <div class="modal fade" id="cambiar-contraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cambiarPassword', $usuario->first()) }}" method="POST" autocomplete="off"
                    id="formulario" onsubmit="return checkSubmit();">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group position-relative row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="id">
                                @csrf
                                @method('PUT')
                                <label class="h5">Nueva Contraseña</label>
                                <input type="password" name="new_password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="contraseña"
                                    placeholder="Nueva Contraseña">
                                {!! $errors->first('password', '<div class="invalid-tooltip">:message</div>') !!}
                            </div>
                            <div class="col-md-6">
                                <label class="h5">Confirmacion de Contraseña</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="enviar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
