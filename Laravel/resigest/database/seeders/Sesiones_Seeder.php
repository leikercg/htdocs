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
                'empleado_id'  => 5,
                'residente_id' => 1,
                'Fecha'        => '2024-03-14',
                'Hora'         => '12:00',
            ],
        ]);
    }
}
