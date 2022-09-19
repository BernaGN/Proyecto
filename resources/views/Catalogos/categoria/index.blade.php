@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    {{ Breadcrumbs::render('categoria.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Categorias
                            </span>

                            <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right"
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
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->informacion->nombre }}</td>
                                        <td>{{ $categoria->informacion->descripcion }}</td>
                                        <td>
                                            @if ($categoria->deleted_at == null)
                                                <span class="badge badge-pill badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($categoria->deleted_at == null)
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                                            method="POST">
                                                            <a class="dropdown-item"
                                                                href="{{ route('categorias.show', $categoria->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> Ver
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('categorias.edit', $categoria->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> Editar
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="fa fa-fw fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ route('categorias-restore', $categoria) }}">Restaurar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $categorias->appends(['buscar' => $buscar, 'activo' => $activo])->links() !!}
            </div>
        </div>
    </div>
@stop
