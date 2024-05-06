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
            'dni' => '11111111A',
            'nombre' => 'Ana',
            'apellidos' => 'González',
            'habitacion' => 101,
            'estado'=>'alta',
            'contacto' =>'666666666',
            'fecha_nac' => '1940-05-15',
            'created_at' => '2011-11-11',
        ]);

        Residente::create([
            'dni' => '22222222B',
            'nombre' => 'Pedro',
            'apellidos' => 'Martínez',
            'habitacion' => 102,
            'estado'=>'alta',
            'contacto' =>'999999999',
            'fecha_nac' => '1935-09-20',
            'created_at' => '2018-11-11',
        ]);
        Residente::create([
            'dni' => '33333333C',
            'nombre' => 'Baja',
            'apellidos' => 'Bajado',
            'habitacion' => 103,
            'estado'=>'baja',
            'contacto' =>'696969696',
            'fecha_nac' => '1900-09-23',
            'created_at' => '2018-11-11',
        ]);

    }
}
