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
    public function run(): void
    {


        DB::table('departamentos')->insert([
            ['nombre' => 'Medicina'],
            ['nombre' => 'Enfermería'],
            ['nombre' => 'Fisioterapia'],
            ['nombre' => 'Terapia'],
            ['nombre' => 'Asistencial'],
            ['nombre' => 'Familiar'],
            ['nombre' => 'Gerencia'],

        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'dni'=>'123456789',
            'email' => 'test@example.com',
            'id_departamento'=>1,
        ]);

          // usuarios
          User::factory()->create([
            'name' => 'Usuario1',
            'dni' => '12345678A',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('password1'),
            'id_departamento'=>1,
        ]);

        User::factory()->create([
            'name' => 'Usuario2',
            'dni' => '98765432B',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('password2'),
            'id_departamento'=>2,
        ]);

        User::factory()->create([
            'name' => 'Usuario3',
            'dni' => '11122233C',
            'email' => 'usuario3@example.com',
            'password' => Hash::make('password3'),
            'id_departamento'=>3,
        ]);

        User::factory()->create([
            'name' => 'Usuario4',
            'dni' => '44455566D',
            'email' => 'usuario4@example.com',
            'password' => Hash::make('password4'),
            'id_departamento'=>4,
        ]);

        User::factory()->create([
            'name' => 'Usuario5',
            'dni' => '77788899E',
            'email' => 'usuario5@example.com',
            'password' => Hash::make('password5'),
            'id_departamento'=>5,
        ]);

        ////////////////////familiares

        User::factory()->create([
            'dni' => 'FAM111111',
            'name' => 'Luis',
            'email' => 'luis@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,
        ]);

        User::factory()->create([
            'dni' => '73222673B',
            'name' => 'Leiker',
            'email' => 'leiker@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,

        ]);

        User::factory()->create([
            'dni' => 'FAM222222',
            'name' => 'Elena',
            'email' => 'elena@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,

        ]);
        User::factory()->create([
            'dni' => 'FAM333333',
            'name' => 'Carlos Lopez',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,

        ]);

        User::factory()->create([
            'dni' => 'FAM444444',
            'name' => 'Marta Sanchez',
            'email' => 'marta@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,

        ]);

        User::factory()->create([
            'dni' => 'FAM555555',
            'name' => 'Pedro Perez',
            'email' => 'pedro@example.com',
            'password' => Hash::make('password123'),
            'id_departamento'=>6,

        ]);


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
