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
        Schema::create('familiar_residente', function (Blueprint $table) {
            $table->char('Id_familiar', 9);
            $table->char('Id_residente', 9);
            $table->primary(['Id_familiar', 'Id_residente']);
            $table->foreign('Id_familiar')->references('Id_familiar')->on('familiares')->onDelete('cascade');
            $table->foreign('Id_residente')->references('Id_residente')->on('residentes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar_residente');
    }
};
