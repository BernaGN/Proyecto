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
    }
}
