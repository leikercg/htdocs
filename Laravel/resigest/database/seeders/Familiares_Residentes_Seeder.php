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
        DB::table('familiar_residente')->insert([
            [
                'Id_familiar' => 'FAM111111',
                'Id_residente' => '11111111A',
            ],
            [
                'Id_familiar' => '73222673B',
                'Id_residente' => '11111111A',
            ],

            [
                'Id_familiar' => 'FAM222222',
                'Id_residente' => '22222222B',
            ],
            [
                'Id_familiar' => 'FAM333333',
                'Id_residente' => '33333333C',
            ],
            [
                'Id_familiar' => 'FAM444444',
                'Id_residente' => '44444444D',
            ],
            [
                'Id_familiar' => 'FAM555555',
                'Id_residente' => '55555555E',
            ],
        ]);
    }
}
