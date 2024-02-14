<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            'genre' => 'Acción',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Animación',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Aventura',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Ciencia ficción',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Comedia',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Drama',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Fantasía',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Historia',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Romance',
        ]);
        DB::table('genres')->insert([
            'genre' => 'Terror',
        ]);
    }
}
