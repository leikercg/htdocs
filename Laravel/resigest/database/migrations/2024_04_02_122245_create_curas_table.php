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
        Schema::create('curas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residente_id');
            $table->unsignedBigInteger('empleado_id');
            $table->date('fecha')->nullable(false);
            $table->time('hora', 0)->nullable(false);//Formato hh:mm
            $table->string('zona', 255)->nullable(false);
            $table->string('estado', 50)->nullable(false);
            $table->foreign('residente_id')->references('id')->on('residentes')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curas');
    }
};
