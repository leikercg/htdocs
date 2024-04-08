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
                'Id_familiar' => 'FAM111111',
                'Nombre' => 'Luis',
                'Apellidos' => 'Gonzalez',
                'Direccion' => 'Calle Principal 123',
                'Telefono' => '123456789',
                'Id_departamento'=>6,
            ],
            [
                'Id_familiar' => '73222673B',
                'Nombre' => 'Leiker',
                'Apellidos' => 'Castillo Gonzalez',
                'Direccion' => 'Calle Delicias 123',
                'Telefono' => '692697712',
                'Id_departamento'=>6,

            ],
            [
                'Id_familiar' => 'FAM222222',
                'Nombre' => 'Elena',
                'Apellidos' => 'Martinez',
                'Direccion' => 'Avenida Central 456',
                'Telefono' => '987654321',
                'Id_departamento'=>6,

            ],
            [
                'Id_familiar' => 'FAM333333',
                'Nombre' => 'Carlos',
                'Apellidos' => 'Lopez',
                'Direccion' => 'Calle Secundaria 789',
                'Telefono' => '111222333',
                'Id_departamento'=>6,

            ],
            [
                'Id_familiar' => 'FAM444444',
                'Nombre' => 'Marta',
                'Apellidos' => 'Sanchez',
                'Direccion' => 'Paseo de la Montana 101',
                'Telefono' => '444555666',
                'Id_departamento'=>6,

            ],
            [
                'Id_familiar' => 'FAM555555',
                'Nombre' => 'Pedro',
                'Apellidos' => 'Perez',
                'Direccion' => 'Calle de la Plaza 456',
                'Telefono' => '777888999',
                'Id_departamento'=>6,

            ],
        ]);
    }
}
