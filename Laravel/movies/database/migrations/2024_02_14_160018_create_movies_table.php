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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->date("release_date");
            $table->string("duration");
            $table->string("image");
            $table->text("synopsis");
            $table->unsignedBigInteger("genre_id");
            $table->unsignedBigInteger("director_id");
            $table->unsignedBigInteger("lead_actor_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
