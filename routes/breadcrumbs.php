<?php

use App\Models\Rol;
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
