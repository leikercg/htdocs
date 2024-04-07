<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Curas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('curas')->insert([
            [
                'Id_residente' => '11111111A',
                'Id_empleado' => '98765432B',
                'Fecha' => '2024-03-14',
                'Hora' => '15:00:00',
                'Zona' => 'Cadera',
                'Estado' => 'Irritado',
            ],
        ]);
    }
}
