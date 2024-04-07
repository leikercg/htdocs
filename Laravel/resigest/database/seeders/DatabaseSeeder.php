<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
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
