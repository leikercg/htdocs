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
            $table->id();
            $table->char('dni', 9);
            $table->string('nombre', 255)->nullable(false);
            $table->string('apellidos', 255)->nullable(false);
            $table->string('direccion', 255);
            $table->string('telefono', 15)->nullable(false);
            $table->unsignedBigInteger('departamento_id');
            $table->timestamps();

            $table->foreign('dni')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
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
