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
        Schema::create('residentes_grupos', function (Blueprint $table) {
            $table->char('Id_residente', 9);
            $table->unsignedBigInteger('Id_grupo');
            $table->primary(['Id_residente', 'Id_grupo']);
            $table->foreign('Id_residente')->references('Id_residente')->on('residentes');
            $table->foreign('Id_grupo')->references('id')->on('grupos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentes_grupos');
    }
};
