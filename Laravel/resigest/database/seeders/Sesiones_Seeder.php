<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sesiones_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sesiones')->insert([
            [
                'Id_empleado'  => '11122233C',
                'Id_residente' => '11111111A',
                'Fecha'        => '2024-03-14',
                'Hora'         => '12:00:00',
            ],
        ]);
    }
}
