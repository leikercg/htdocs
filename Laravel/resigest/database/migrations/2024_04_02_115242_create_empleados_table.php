<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->char('id', 9)->primary();
            $table->string('Nombre', 255)->nullable(false);
            $table->string('Apellidos', 255)->nullable(false);
            $table->string('Direccion', 255)->nullable(false);
            $table->string('Telefono', 20)->nullable(false);
            $table->unsignedBigInteger('Id_departamento');
            $table->foreign('Id_departamento')->references('id')->on('departamentos');
            $table->timestamps();

            $table->foreign('id')->references('dni')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
