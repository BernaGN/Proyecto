<?php

use App\Models\Audit;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Etiqueta;
use App\Models\Habilidad;
use App\Models\Permiso;
use App\Models\Proyecto;
use App\Models\Rol;
use App\Models\Servicio;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//Dashboard
Breadcrumbs::for('dashboard', fn(BreadcrumbTrail $trail) => $trail
    ->push('Darboard', route('home'))
);

//Sistema
Breadcrumbs::for('sistema', fn(BreadcrumbTrail $trail) => $trail
    ->push('Sistema')
);

//Sistema/Usuarios
Breadcrumbs::for('users.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Usuarios', route('usuarios.index'))
);

Breadcrumbs::for('users.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('users.index')
    ->push('Agregar Usuario')
);

Breadcrumbs::for('users.update', fn(BreadcrumbTrail $trail, User $user) => $trail
    ->parent('users.index')
    ->push($user->name, route('usuarios.update', $user))
);

Breadcrumbs::for('perfil.edit', fn(BreadcrumbTrail $trail, User $user) => $trail
    ->parent('sistema')
    ->push($user->name, route('perfil.edit', $user))
);

//Sistema/Roles
Breadcrumbs::for('roles.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Roles', route('roles.index'))
);

Breadcrumbs::for('roles.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('roles.index')
    ->push('Agregar Rol')
);

Breadcrumbs::for('roles.update', fn(BreadcrumbTrail $trail, Rol $role) => $trail
    ->parent('roles.index')
    ->push($role->name, route('roles.update', $role))
);
//Sistema/Auditorias
Breadcrumbs::for('auditorias.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Auditorias', route('auditorias.index'))
);

Breadcrumbs::for('auditorias.show', fn(BreadcrumbTrail $trail, Audit $audit) => $trail
    ->parent('roles.index')
    ->push($audit->auditable_id, route('auditorias.show', $audit))
);

//Catalogos
Breadcrumbs::for('catalogo', fn(BreadcrumbTrail $trail) => $trail
    ->push('Catalogo')
);

//Catalogos/Permisos
Breadcrumbs::for('permiso.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Permisos', route('permisos.index'))
);

Breadcrumbs::for('permiso.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('permiso.index')
    ->push('Agregar Permiso')
);

Breadcrumbs::for('permiso.show', fn(BreadcrumbTrail $trail, Permiso $permiso) => $trail
    ->parent('permiso.index')
    ->push($permiso->name, route('permisos.show', $permiso))
);

Breadcrumbs::for('permiso.update', fn(BreadcrumbTrail $trail, Permiso $permiso) => $trail
    ->parent('permiso.index')
    ->push($permiso->name, route('permisos.update', $permiso))
);

//Catalogos/Permisos
Breadcrumbs::for('categoria.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Categorias', route('categorias.index'))
);

Breadcrumbs::for('categoria.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('categoria.index')
    ->push('Agregar Categoria')
);

Breadcrumbs::for('categoria.show', fn(BreadcrumbTrail $trail, Categoria $categoria) => $trail
    ->parent('categoria.index')
    ->push($categoria->id, route('categorias.show', $categoria))
);

Breadcrumbs::for('categoria.update', fn(BreadcrumbTrail $trail, Categoria $categoria) => $trail
    ->parent('categoria.index')
    ->push($categoria->id, route('categorias.update', $categoria))
);

//Catalogos/Cliente
Breadcrumbs::for('cliente.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Clientes', route('clientes.index'))
);

Breadcrumbs::for('cliente.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('cliente.index')
    ->push('Agregar Cliente')
);

Breadcrumbs::for('cliente.show', fn(BreadcrumbTrail $trail, Cliente $cliente) => $trail
    ->parent('cliente.index')
    ->push($cliente->nombre, route('clientes.show', $cliente))
);

Breadcrumbs::for('cliente.update', fn(BreadcrumbTrail $trail, Cliente $cliente) => $trail
    ->parent('cliente.index')
    ->push($cliente->nombre, route('clientes.update', $cliente))
);

//Catalogos/Etiqueta
Breadcrumbs::for('etiqueta.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Etiqueta', route('etiquetas.index'))
);

Breadcrumbs::for('etiqueta.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('etiqueta.index')
    ->push('Agregar Etiqueta')
);

Breadcrumbs::for('etiqueta.show', fn(BreadcrumbTrail $trail, Etiqueta $etiqueta) => $trail
    ->parent('etiqueta.index')
    ->push($etiqueta->id, route('etiquetas.show', $etiqueta))
);

Breadcrumbs::for('etiqueta.update', fn(BreadcrumbTrail $trail, Etiqueta $etiqueta) => $trail
    ->parent('etiqueta.index')
    ->push($etiqueta->id, route('etiquetas.update', $etiqueta))
);

//Catalogos/Habilidad
Breadcrumbs::for('habilidad.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Habilidad', route('habilidades.index'))
);

Breadcrumbs::for('habilidad.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('habilidad.index')
    ->push('Agregar Habilidad')
);

Breadcrumbs::for('habilidad.show', fn(BreadcrumbTrail $trail, Habilidad $habilidade) => $trail
    ->parent('habilidad.index')
    ->push($habilidade->nombre, route('etiquetas.show', $habilidade))
);

Breadcrumbs::for('habilidad.update', fn(BreadcrumbTrail $trail, Habilidad $habilidade) => $trail
    ->parent('habilidad.index')
    ->push($habilidade->nombre, route('etiquetas.update', $habilidade))
);

//Catalogos/Servicios
Breadcrumbs::for('servicio.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Servicio', route('servicios.index'))
);

Breadcrumbs::for('servicio.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('servicio.index')
    ->push('Agregar Servicio')
);

Breadcrumbs::for('servicio.show', fn(BreadcrumbTrail $trail, Servicio $servicio) => $trail
    ->parent('servicio.index')
    ->push($servicio->id, route('servicios.show', $servicio))
);

Breadcrumbs::for('servicio.update', fn(BreadcrumbTrail $trail, Servicio $servicio) => $trail
    ->parent('servicio.index')
    ->push($servicio->id, route('servicios.update', $servicio))
);

//Procesos/Proyectos
Breadcrumbs::for('proyecto.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Proyecto', route('proyectos.index'))
);

Breadcrumbs::for('proyecto.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('proyecto.index')
    ->push('Agregar Proyecto')
);

Breadcrumbs::for('proyecto.show', fn(BreadcrumbTrail $trail, Proyecto $proyecto) => $trail
    ->parent('proyecto.index')
    ->push($proyecto->id, route('proyectos.show', $proyecto))
);

Breadcrumbs::for('proyecto.update', fn(BreadcrumbTrail $trail, Proyecto $proyecto) => $trail
    ->parent('proyecto.index')
    ->push($proyecto->id, route('proyectos.update', $proyecto))
);

//Procesos
Breadcrumbs::for('proceso', fn(BreadcrumbTrail $trail) => $trail
    ->push('Proceso')
);
