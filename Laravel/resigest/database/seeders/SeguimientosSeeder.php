<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeguimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Seguimiento del departamento de Medicina para el primer residente
        DB::table('seguimientos')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_departamento' => 1, // ID del departamento de Medicina
                'Seguimiento' => 'Seguimiento del departamento de Medicina para Ana González',
            ],
        ]);

        // Seguimiento del departamento de Enfermería para el primer residente
        DB::table('seguimientos')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_departamento' => 2, // ID del departamento de Enfermería
                'Seguimiento' => 'Seguimiento del departamento de Enfermería para Ana González',
            ],
        ]);

        // Seguimiento del departamento de Fisioterapia para el primer residente
        DB::table('seguimientos')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_departamento' => 3, // ID del departamento de Fisioterapia
                'Seguimiento' => 'Seguimiento del departamento de Fisioterapia para Ana González',
            ],
        ]);

        // Seguimiento del departamento de Terapia para el primer residente
        DB::table('seguimientos')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_departamento' => 4, // ID del departamento de Terapia
                'Seguimiento' => 'Seguimiento del departamento de Terapia para Ana González',
            ],
        ]);

        // Seguimiento del departamento Asistencial para el primer residente
        DB::table('seguimientos')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_departamento' => 5, // ID del departamento Asistencial
                'Seguimiento' => 'Seguimiento del departamento Asistencial para Ana González',
            ],
        ]);
    }
}

