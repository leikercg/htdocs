<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Empleado del departamento de Medicina
        DB::table('empleados')->insert([
            'Id' => '12345678A',
            'Nombre' => 'Juan',
            'Apellidos' => 'Pérez',
            'Direccion' => 'Calle Principal 123',
            'Telefono' => '123456789',
            'Id_departamento' => DB::table('departamentos')->where('nombre', 'Medicina')->value('id'),
        ]);

        // Empleado del departamento de Enfermería
        DB::table('empleados')->insert([
            'id' => '98765432B',
            'Nombre' => 'María',
            'Apellidos' => 'García',
            'Direccion' => 'Avenida Central 456',
            'Telefono' => '987654321',
            'Id_departamento' => DB::table('departamentos')->where('nombre', 'Enfermería')->value('id'),
        ]);
        // Empleado del departamento de Fisioterapia
        DB::table('empleados')->insert([
            'id' => '11122233C',
            'Nombre' => 'Pedro',
            'Apellidos' => 'López',
            'Direccion' => 'Calle Secundaria 789',
            'Telefono' => '111222333',
            'Id_departamento' => DB::table('departamentos')->where('nombre', 'Fisioterapia')->value('id'),
        ]);

        // Empleado del departamento de Terapia

        DB::table('empleados')->insert([
            'id' => '44455566D',
            'Nombre' => 'Laura',
            'Apellidos' => 'Martínez',
            'Direccion' => 'Paseo de la Montaña 101',
            'Telefono' => '444555666',
            'Id_departamento' => DB::table('departamentos')->where('nombre', 'Terapia')->value('id'),
        ]);

        // Empleado del departamento de Asistencia
        DB::table('empleados')->insert([
            'id' => '77788899E',
            'Nombre' => 'Carlos',
            'Apellidos' => 'Rodríguez',
            'Direccion' => 'Calle de la Plaza 456',
            'Telefono' => '777888999',
            'Id_departamento' => DB::table('departamentos')->where('nombre', 'Asistencial')->value('id'),
        ]);
    }
}
