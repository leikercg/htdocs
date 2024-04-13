<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FamiliaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('familiares')->insert([
            [
                'dni' => '1111111F1',
                'nombre' => 'Luis',
                'apellidos' => 'Gonzalez',
                'direccion' => 'Calle Principal 123',
                'telefono' => '123456789',
                'departamento_id'=>6,
            ],
            [
                'dni' => '1111111F2',
                'nombre' => 'Leiker',
                'apellidos' => 'Castillo',
                'direccion' => 'Calle Delicias 123',
                'telefono' => '123456789',
                'departamento_id'=>6,
            ],
            [
                'dni' => '1111111F3',
                'nombre' => 'Elena',
                'apellidos' => 'Martinez',
                'direccion' => 'Avenida Central 123',
                'telefono' => '123456789',
                'departamento_id'=>6,
            ],

        ]);
    }
}
