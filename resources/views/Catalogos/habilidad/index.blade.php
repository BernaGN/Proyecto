@extends('adminlte::page')

@section('title', 'Habilidades')

@section('content_header')
    {{ Breadcrumbs::render('habilidad.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Habilidad') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('habilidades.create') }}" class="btn btn-primary btn-sm float-right"
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

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($habilidades as $habilidad)
                                    <tr>
                                        <td>{{ $habilidad->id }}</td>

                                        <td>{{ $habilidad->nombre }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <form action="{{ route('habilidades.destroy', $habilidad->id) }}"
                                                        method="POST">
                                                        <a class="dropdown-item"
                                                            href="{{ route('habilidades.show', $habilidad->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Ver</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('habilidades.edit', $habilidad->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $habilidades->appends(['buscar' => $buscar, 'activo' => $activo])->links() !!}
            </div>
        </div>
    </div>
@stop
