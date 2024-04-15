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
                'residente_id' => 1,
                'empleado_id' => 3,
                'Fecha' => '2024-03-14',
                'Hora' => '15:00',
                'Zona' => 'Cadera',
                'Estado' => 'Irritado',
            ],
        ]);
    }
}
