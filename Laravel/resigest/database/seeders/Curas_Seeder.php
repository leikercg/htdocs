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
                'fecha' => '2024-03-14',
                'hora' => '15:00',
                'zona' => 'Cadera',
                'estado' => 'Irritado',
            ],
        ]);
    }
}
