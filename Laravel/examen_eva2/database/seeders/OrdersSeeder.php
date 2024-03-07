<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('orders')->insert([
            'product_id' => 1,
            'supplier_id' => 2,
            'employee_id' => 5,
            'amount' => 30,
            'price' => 1.18,
            'comments' => 'Pedir descuento del 23% al proveedor',
        ]);
        DB::table('orders')->insert([
            'product_id' => 3,
            'supplier_id' => 1,
            'employee_id' => 2,
            'amount' => 20,
            'price' => 4.52,
            'comments' => 'Revisar productos en almacén',
        ]);
        DB::table('orders')->insert([
            'product_id' => 4,
            'supplier_id' => 3,
            'employee_id' => 5,
            'amount' => 10,
            'price' => 3.12,
            'comments' => 'No volver a pedir hasta nueva orden',
        ]);
        DB::table('orders')->insert([
            'product_id' => 6,
            'supplier_id' => 2,
            'employee_id' => 5,
            'amount' => 27,
            'price' => 3.44,
            'comments' => 'Pedir descuento 23% al proveedor',
        ]);

    }
}
