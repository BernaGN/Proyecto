<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Rol::create(['name' => 'Administrador']);
        $operador = Rol::create(['name' => 'Operador']);

        Permiso::create([
            'name' => 'home.index',
            'description' => 'Ver Dashboard',
            'modulo_id' => 1,
        ])->syncRoles([$admin, $operador]);

        Permiso::create([
            'name' => 'usuarios.index',
            'description' => 'Ver Usuarios',
            'modulo_id' => 2,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'usuarios.store',
            'description' => 'Agregar Usuarios',
            'modulo_id' => 2,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'usuarios.update',
            'description' => 'Editar Usuarios',
            'modulo_id' => 2,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'usuarios.destroy',
            'description' => 'Deshabilitar Usuarios',
            'modulo_id' => 2,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'roles.index',
            'description' => 'Ver Rol',
            'modulo_id' => 3,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'roles.store',
            'description' => 'Agregar Rol',
            'modulo_id' => 3,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'roles.update',
            'description' => 'Editar Rol',
            'modulo_id' => 3,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'auditorias.index',
            'description' => 'Ver Auditorias',
            'modulo_id' => 4,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'auditorias.show',
            'description' => 'Ver Detalles de Auditorias',
            'modulo_id' => 4,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'permisos.index',
            'description' => 'Ver Permiso',
            'modulo_id' => 5,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'permisos.store',
            'description' => 'Agregar Permiso',
            'modulo_id' => 5,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'permisos.update',
            'description' => 'Editar Permiso',
            'modulo_id' => 5,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'permisos.destroy',
            'description' => 'Eliminar Permiso',
            'modulo_id' => 5,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'clientes.index',
            'description' => 'Ver Clientes',
            'modulo_id' => 6,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'clientes.store',
            'description' => 'Agregar Clientes',
            'modulo_id' => 6,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'clientes.update',
            'description' => 'Editar Clientes',
            'modulo_id' => 6,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'clientes.destroy',
            'description' => 'Eliminar Clientes',
            'modulo_id' => 6,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'etiquetas.index',
            'description' => 'Ver Etiquetas',
            'modulo_id' => 7,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'etiquetas.store',
            'description' => 'Agregar Etiquetas',
            'modulo_id' => 7,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'etiquetas.update',
            'description' => 'Editar Etiquetas',
            'modulo_id' => 7,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'etiquetas.destroy',
            'description' => 'Eliminar Etiquetas',
            'modulo_id' => 7,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'habilidades.index',
            'description' => 'Ver Habilidades',
            'modulo_id' => 8,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'habilidades.store',
            'description' => 'Agregar Habilidades',
            'modulo_id' => 8,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'habilidades.update',
            'description' => 'Editar Habilidades',
            'modulo_id' => 8,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'habilidades.destroy',
            'description' => 'Eliminar Habilidades',
            'modulo_id' => 8,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'servicios.index',
            'description' => 'Ver Servicios',
            'modulo_id' => 9,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'servicios.store',
            'description' => 'Agregar Servicios',
            'modulo_id' => 9,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'servicios.update',
            'description' => 'Editar Servicios',
            'modulo_id' => 9,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'servicios.destroy',
            'description' => 'Eliminar Servicios',
            'modulo_id' => 9,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'categorias.index',
            'description' => 'Ver Categorias',
            'modulo_id' => 10,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'categorias.store',
            'description' => 'Agregar Categorias',
            'modulo_id' => 10,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'categorias.update',
            'description' => 'Editar Categorias',
            'modulo_id' => 10,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'categorias.destroy',
            'description' => 'Eliminar Categorias',
            'modulo_id' => 10,
        ])->syncRoles([$admin]);

        Permiso::create([
            'name' => 'proyectos.index',
            'description' => 'Ver Proyectos',
            'modulo_id' => 11,
        ])->syncRoles([$admin, $operador]);
        Permiso::create([
            'name' => 'proyectos.store',
            'description' => 'Agregar Proyectos',
            'modulo_id' => 11,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'proyectos.update',
            'description' => 'Editar Proyectos',
            'modulo_id' => 11,
        ])->syncRoles([$admin]);
        Permiso::create([
            'name' => 'proyectos.destroy',
            'description' => 'Eliminar Proyectos',
            'modulo_id' => 11,
        ])->syncRoles([$admin]);

    }
}
