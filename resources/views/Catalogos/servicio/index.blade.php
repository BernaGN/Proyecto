@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    {{ Breadcrumbs::render('servicio.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicio') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Agregar
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <x-layouts.buscador route="categorias" :buscar="$buscar" :activo="$activo" />
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td>{{ $servicio->id }}</td>
                                        <td>{{ $servicio->informacion->nombre }}</td>
                                        <td>{{ $servicio->informacion->descripcion }}</td>
                                        <td>
                                            @if ($servicio->deleted_at == null)
                                                <span class="badge badge-pill badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($servicio->deleted_at == null)
                                                <div class="dropdown">
                                                    <button class="btn btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <form action="{{ route('servicios.destroy', $servicio->id) }}"
                                                            method="POST">
                                                            <a class="dropdown-item"
                                                                href="{{ route('servicios.show', $servicio->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Ver
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('servicios.edit', $servicio->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> Editar
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            @else
                                                <a href="{{ route('servicios-restore', $servicio) }}">Restaurar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $servicios->appends(['buscar' => $buscar, 'activo' => $activo])->links() !!}
            </div>
        </div>
    </div>
@stop
