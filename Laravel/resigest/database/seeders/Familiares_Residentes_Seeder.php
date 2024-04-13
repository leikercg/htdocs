<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Familiares_Residentes_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('familiares_residentes')->insert([
            [
                'familiar_id' => 1,
                'residente_id' => 1,
            ],
            [
                'familiar_id' => 2,
                'residente_id' => 1,
            ],

            [
                'familiar_id' => 3,
                'residente_id' => 2,
            ],
        ]);
    }
}
