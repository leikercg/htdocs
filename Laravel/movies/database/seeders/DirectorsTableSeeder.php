<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directors')->insert([
            'name' => 'David',
            'surname' => 'Ayer',
            'movie_id' => '1',
        ]);
        DB::table('directors')->insert([
            'name' => 'Heo',
            'surname' => 'Myeong-haeng',
            'movie_id' => '2',
        ]);
        DB::table('directors')->insert([
            'name' => 'Nia',
            'surname' => 'DaCosta',
            'movie_id' => '3',
        ]);
        DB::table('directors')->insert([
            'name' => 'Francis',
            'surname' => 'Lawrence',
            'movie_id' => '4',
        ]);
        DB::table('directors')->insert([
            'name' => 'Raman',
            'surname' => 'Hui',
            'movie_id' => '5',
        ]);
        DB::table('directors')->insert([
            'name' => 'Kimani',
            'surname' => 'Ray Smith',
            'movie_id' => '6',
        ]);
        DB::table('directors')->insert([
            'name' => 'Thomas',
            'surname' => 'Vincent',
            'movie_id' => '7',
        ]);
        DB::table('directors')->insert([
            'name' => 'Will',
            'surname' => 'Gluck',
            'movie_id' => '8',
        ]);
        DB::table('directors')->insert([
            'name' => 'Ridley',
            'surname' => 'Scott',
            'movie_id' => '9',
        ]);
        DB::table('directors')->insert([
            'name' => 'Simon',
            'surname' => 'Cellan Jones',
            'movie_id' => '10',
        ]);
        DB::table('directors')->insert([
            'name' => 'Eli',
            'surname' => 'Roth',
            'movie_id' => '11',
        ]);
        DB::table('directors')->insert([
            'name' => 'Jaime',
            'surname' => 'Pacena II',
            'movie_id' => '12',
        ]);
        DB::table('directors')->insert([
            'name' => 'Alessandro',
            'surname' => 'Colasanti',
            'movie_id' => '13',
        ]);
        DB::table('directors')->insert([
            'name' => 'Tensai',
            'surname' => 'Okamura',
            'movie_id' => '14',
        ]);
        DB::table('directors')->insert([
            'name' => 'Shawn',
            'surname' => 'Levy',
            'movie_id' => '15',
        ]);
        DB::table('directors')->insert([
            'name' => 'Paul',
            'surname' => 'King',
            'movie_id' => '16',
        ]);
        DB::table('directors')->insert([
            'name' => 'Chris',
            'surname' => 'Buck',
            'movie_id' => '17',
        ]);
        DB::table('directors')->insert([
            'name' => 'Benjamin',
            'surname' => 'Renner',
            'movie_id' => '18',
        ]);
        DB::table('directors')->insert([
            'name' => 'Zack',
            'surname' => 'Snyder',
            'movie_id' => '19',
        ]);
        DB::table('directors')->insert([
            'name' => 'Scott',
            'surname' => 'Waugh',
            'movie_id' => '20',
        ]);
        DB::table('directors')->insert([
            'name' => 'Christopher',
            'surname' => 'Nolan',
            'movie_id' => '21',
        ]);
        DB::table('directors')->insert([
            'name' => 'Hayao',
            'surname' => 'Miyazaki',
            'movie_id' => '22',
        ]);
        DB::table('directors')->insert([
            'name' => 'Yorgos',
            'surname' => 'Lanthimos',
            'movie_id' => '23',
        ]);
        DB::table('directors')->insert([
            'name' => 'J.A.',
            'surname' => 'Bayona',
            'movie_id' => '24',
        ]);
        DB::table('directors')->insert([
            'name' => 'Gareth',
            'surname' => 'Edwards',
            'movie_id' => '25',
        ]);
        DB::table('directors')->insert([
            'name' => 'Jason',
            'surname' => 'Parker',
            'movie_id' => '26',
        ]);
        DB::table('directors')->insert([
            'name' => 'Steven',
            'surname' => 'Caple Jr.',
            'movie_id' => '27',
        ]);
        DB::table('directors')->insert([
            'name' => 'Louis',
            'surname' => 'Leterrier',
            'movie_id' => '28',
        ]);
        DB::table('directors')->insert([
            'name' => 'Antoine',
            'surname' => 'Fuqua',
            'movie_id' => '29',
        ]);
        DB::table('directors')->insert([
            'name' => 'Charles',
            'surname' => 'Stone III',
            'movie_id' => '30',
        ]);
        DB::table('directors')->insert([
            'name' => 'Chad',
            'surname' => 'Stahelski',
            'movie_id' => '31',
        ]);
        DB::table('directors')->insert([
            'name' => 'Ben',
            'surname' => 'Wheatley',
            'movie_id' => '32',
        ]);
        DB::table('directors')->insert([
            'name' => 'James',
            'surname' => 'Cameron',
            'movie_id' => '33',
        ]);
    }
}
