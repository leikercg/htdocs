<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void// este es el primer seeder que se ejecuta
    {


        DB::table('departamentos')->insert([ //Cellenamnos tabla de departamentos
            ['nombre' => 'Medicina'],
            ['nombre' => 'Enfermería'],
            ['nombre' => 'Fisioterapia'],
            ['nombre' => 'Terapia'],
            ['nombre' => 'Asistencial'],
            ['nombre' => 'Familiar'],
            ['nombre' => 'Gerencia'],

        ]);
        // User::factory(10)->create();

        User::factory()->create([ // Creamos usuarios de cada campo
            'name' => 'Test User',
            'dni'=>'123456789',
            'email' => 'test@example.com',
            'departamento_id'=>1,
        ]);

          // Usuarios para pruebas

          //////ADMIN ////
          User::factory()->create([
            'name' => 'ADMIN',
            'dni' => '12345678G',
            'email' => 'admin@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>7,
        ]);

          User::factory()->create([
            'name' => 'Usuario1',
            'dni' => '12345678M',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>1,
        ]);

        User::factory()->create([
            'name' => 'Usuario2',
            'dni' => '12345678E',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>2,
        ]);

        User::factory()->create([
            'name' => 'Usuario3',
            'dni' => '12345678F',
            'email' => 'usuario3@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>3,
        ]);

        User::factory()->create([
            'name' => 'Usuario4',
            'dni' => '12345678T',
            'email' => 'usuario4@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>4,
        ]);

        User::factory()->create([
            'name' => 'Usuario5',
            'dni' => '12345678A',
            'email' => 'usuario5@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>5,
        ]);

        ////////////////////Familiares para pruebas

        User::factory()->create([
            'dni' => '1111111F1',
            'name' => 'Luis',
            'email' => 'luis@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>6,
        ]);

        User::factory()->create([
            'dni' => '1111111F2',
            'name' => 'Leiker',
            'email' => 'leiker@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>6,

        ]);

        User::factory()->create([
            'dni' => '1111111F3',
            'name' => 'Elena',
            'email' => 'elena@example.com',
            'password' => Hash::make('password1'),
            'departamento_id'=>6,

        ]);
        // Se ejecutan los seeders en este orden
        $this->call(DepartamentosSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(ResidentesSeeder::class);
        $this->call(SeguimientosSeeder::class);
        $this->call(FamiliaresSeeder::class);
        $this->call(Familiares_Residentes_Seeder::class);
        $this->call(Sesiones_Seeder::class);
        $this->call(Visitas_Seeder::class);
        $this->call(Curas_Seeder::class);




    }
}
