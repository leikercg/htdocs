<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Visitas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('visitas')->insert([
            [
                'Id_empleado'  => '12345678A',
                'Id_residente' => '11111111A',
                'Fecha'        => '2024-03-14',
                'Hora'         => '10:00:00',
            ],
        ]);
    }
}
