<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers_table', function (Blueprint $table) {
            $table->id();
            $table->string("name", "100");
            $table->string("address", "100");
            $table->string("city", "100");
            $table->string("country", "100");


            $table->unsignedBigInteger('contact_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers_table');
    }
};
