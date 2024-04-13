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
        Schema::create('familiares_residentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('familiar_id');
            $table->unsignedBigInteger('residente_id');
            $table->foreign('familiar_id')->references('id')->on('familiares')->onDelete('cascade');
            $table->foreign('residente_id')->references('id')->on('residentes')->onDelete('cascade');
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
