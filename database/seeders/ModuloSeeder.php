<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulo::create(['name' => 'Home']);
        Modulo::create(['name' => 'Usuarios']);
        Modulo::create(['name' => 'Roles']);
        Modulo::create(['name' => 'Auditorias']);
        Modulo::create(['name' => 'Permisos']);
        Modulo::create(['name' => 'Clientes']);
        Modulo::create(['name' => 'Etiquetas']);
        Modulo::create(['name' => 'Habilidades']);
        Modulo::create(['name' => 'Servicios']);
        Modulo::create(['name' => 'Categorias']);
        Modulo::create(['name' => 'Proyectos']);
    }
}
