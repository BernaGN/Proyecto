@extends('adminlte::page')

@section('title', 'Proyectos')

@section('content_header')
    {{ Breadcrumbs::render('proyecto.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proyecto') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('proyectos.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Cliente</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td>{{ $proyecto->id }}</td>
                                        <td>{{ $proyecto->cliente->nombre }}</td>
                                        <td>{{ $proyecto->informacion->nombre }}</td>
                                        <td>{{ $proyecto->informacion->descripcion }}</td>
                                        <td>
                                            @if ($proyecto->deleted_at == null)
                                                <span class="badge badge-pill badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($proyecto->deleted_at == null)
                                                <div class="dropdown">
                                                    <button class="btn btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <form action="{{ route('proyectos.destroy', $proyecto->id) }}"
                                                            method="POST">
                                                            <a class="dropdown-item"
                                                                href="{{ route('proyectos.show', $proyecto->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i> Ver</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('proyectos.edit', $proyecto->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            @else
                                                <a href="{{ route('proyectos-restore', $proyecto) }}">Restaurar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $proyectos->links() !!}
            </div>
        </div>
    </div>
@stop
