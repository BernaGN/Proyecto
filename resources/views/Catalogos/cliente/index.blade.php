@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    {{ Breadcrumbs::render('cliente.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{ Breadcrumbs::render('cliente.index') }}
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cliente') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Agregar
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>

                                        <td>{{ $cliente->nombre }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                                        method="POST">
                                                        <a class="dropdown-item"
                                                            href="{{ route('clientes.show', $cliente->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i> Ver
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('clientes.edit', $cliente->id) }}">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $clientes->appends(['buscar' => $buscar, 'activo' => $activo])->links() !!}
            </div>
        </div>
    </div>
@stop
