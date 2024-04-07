<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('departamentos')->insert([
            ['nombre' => 'Medicina'],
            ['nombre' => 'Enfermería'],
            ['nombre' => 'Fisioterapia'],
            ['nombre' => 'Terapia'],
            ['nombre' => 'Asistencial'],
        ]);
    }
}
