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
        Schema::create('familiares', function (Blueprint $table) {
            $table->char('Id_familiar', 9)->primary();
            $table->string('Nombre', 255)->nullable(false);
            $table->string('Apellidos', 255)->nullable(false);
            $table->string('Direccion', 255);
            $table->string('Telefono', 15)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
