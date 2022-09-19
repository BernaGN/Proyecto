@extends('layouts.plantilla')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection


@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{ Breadcrumbs::render('permiso.index') }}
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h2><i class="fas fa-check-double"></i> Permisos</h2>
                            </span>

                            @can('permisos.store')
                                <div class="float-right">
                                    <a href="{{ route('permisos.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="fas fa-plus"></i> Agregar
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($permissions->count())
                        <div class="card-body">
                            <form action="{{ route('permisos.index') }}" method="GET">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Buscar"
                                        aria-label="Search" aria-describedby="search-addon" name="buscar"
                                        value="{{ $buscar }}" required />
                                    <span class="input-group-text border-0" id="search-addon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </form>
                            <table class="table table-striped table-hover" id="permisos">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

                                        <th>Permiso</th>
                                        <th>Decripcion</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>

                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->description }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-warning dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        Opciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <form action="{{ route('permisos.destroy', $permission->id) }}"
                                                            method="POST">
                                                            <a class="dropdown-item"
                                                                href="{{ route('permisos.show', $permission->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i> Ver</a>
                                                            @can('permisos.update')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('permisos.edit', $permission->id) }}"><i
                                                                        class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @endcan
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('permisos.destroy')
                                                                <button type="submit" class="dropdown-item"><i
                                                                        class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                            @endcan
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $permissions->appends(['buscar' => $buscar])->links() }}
                        </div>
                    @else
                        <div class="card-body"><strong>No hay registros</strong></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#permisos').DataTable({
            columnDefs: [{
                orderable: false,
                targets: [3, 4]
            }],
            responsive: true,
            autoWidth: false,
            paging: false,
            info: false,
            searching: false,
            "language": {
                "zeroRecords": "Nada encontrado - Disculpe",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles ",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior",
                },
                prosessing: "Procesando"
            },
        });
    </script>
@endsection
