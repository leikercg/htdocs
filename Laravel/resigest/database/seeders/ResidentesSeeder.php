<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Residente;

class ResidentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Residente::create([//para que las timestamps no sean null hay que usar create o update, además establecemos unos valores manualmente para la antiguedad
            'Id_residente' => '11111111A',
            'Nombre' => 'Ana',
            'Apellidos' => 'González',
            'Habitacion' => 101,
            'Fecha_Nac' => '1940-05-15',
            'created_at' => '2011-11-11',
        ]);

        Residente::create([
            'Id_residente' => '22222222B',
            'Nombre' => 'Pedro',
            'Apellidos' => 'Martínez',
            'Habitacion' => 102,
            'Fecha_Nac' => '1935-09-20',
            'created_at' => '2018-11-11',
        ]);

        Residente::create([
            'Id_residente' => '33333333C',
            'Nombre' => 'María',
            'Apellidos' => 'López',
            'Habitacion' => 103,
            'Fecha_Nac' => '1948-12-10',
            'created_at' => '2015-11-11',
        ]);

        Residente::create([
            'Id_residente' => '44444444D',
            'Nombre' => 'Juan',
            'Apellidos' => 'Sánchez',
            'Habitacion' => 104,
            'Fecha_Nac' => '1943-03-25',
            'created_at' => '2023-11-11',
        ]);

        Residente::create([
            'Id_residente' => '55555555E',
            'Nombre' => 'Laura',
            'Apellidos' => 'Pérez',
            'Habitacion' => 105,
            'Fecha_Nac' => '1950-07-05',
            'created_at' => '2024-11-11',
        ]);
    }
}
