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
    }
}
