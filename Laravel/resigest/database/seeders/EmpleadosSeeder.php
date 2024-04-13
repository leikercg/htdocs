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
            'dni' => '12345678M',
            'nombre' => 'Leiker Medico',
            'apellidos' => 'Castillo Medico',
            'direccion' => 'Calle Medico',
            'telefono' => '123456789',
            'departamento_id' => DB::table('departamentos')->where('nombre', 'Medicina')->value('id'),
        ]);

        // Empleado del departamento de Enfermería
        DB::table('empleados')->insert([
            'dni' => '12345678E',
            'nombre' => 'Leiker Enfermero',
            'apellidos' => 'Castillo Enfermero',
            'direccion' => 'Calle Enfermero',
            'telefono' => '123456789',
            'departamento_id' => DB::table('departamentos')->where('nombre', 'Enfermería')->value('id'),
        ]);
        // Empleado del departamento de Fisioterapia
        DB::table('empleados')->insert([
            'dni' => '12345678F',
            'nombre' => 'Leiker Fisio',
            'apellidos' => 'Castillo Fisio',
            'direccion' => 'Calle Fisio',
            'telefono' => '123456789',
            'departamento_id' => DB::table('departamentos')->where('nombre', 'Fisioterapia')->value('id'),
        ]);

        // Empleado del departamento de Terapia

        DB::table('empleados')->insert([
            'dni' => '12345678T',
            'nombre' => 'Leiker Terapeuta',
            'apellidos' => 'Castillo Terapeuta',
            'direccion' => 'Calle Terapeuta',
            'telefono' => '123456789',
            'departamento_id' => DB::table('departamentos')->where('nombre', 'Terapia')->value('id'),
        ]);

        // Empleado del departamento de Asistencia
        DB::table('empleados')->insert([
            'dni' => '12345678A',
            'nombre' => 'Leiker Aux',
            'apellidos' => 'Castillo Aux',
            'direccion' => 'Calle Aux',
            'telefono' => '123456789',
            'departamento_id' => DB::table('departamentos')->where('nombre', 'Asistencial')->value('id'),
        ]);
    }
}
