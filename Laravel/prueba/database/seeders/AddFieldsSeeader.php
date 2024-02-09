<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddFieldsSeeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'name'        => 'Rosas',
            'description' => 'FLores',
            'price'       => '1.35',
            'stock'       => '20',
            'supplier_id' => '1',
        ]);
        DB::table('products')->insert([
            'name'        => 'Colonia',
            'description' => 'Oler',
            'price'       => '1',
            'stock'       => '205',
            'supplier_id' => '1',
        ]);
        DB::table('products')->insert([
            'name'        => 'Ambientador',
            'description' => 'Oler',
            'price'       => '135',
            'stock'       => '25',
            'supplier_id' => '17',
        ]);
        DB::table('products')->insert([
            'name'        => 'Comida',
            'description' => 'Alimento',
            'price'       => '15',
            'stock'       => '2',
            'supplier_id' => '18',
        ]);
        DB::table('products')->insert([
            'name'        => 'Servilleta',
            'description' => 'Papel',
            'price'       => '5',
            'stock'       => '10',
            'supplier_id' => '9',
        ]);

    }
}
