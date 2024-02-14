<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class supplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('suppliers_table')->insert([
            'name' => 'Schako',
            'address' => 'San Mateo',
            'city' => 'Zaragoza',
            'country' => 'España',
            'contact_id'=>'1',
        ]);
        DB::table('suppliers_table')->insert([
            'name' => 'Valeo',
            'address' => 'Ctra Logroño',
            'city' => 'Zaragoza',
            'country' => 'España',
            'contact_id'=>'2',
        ]);
        DB::table('suppliers_table')->insert([
            'name' => 'Inditext',
            'address' => 'C/Delicias',
            'city' => 'A Coruña',
            'country' => 'ESpaña',
            'contact_id'=>'3',
        ]);
    }
}
