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
        Schema::create('contacs_table', function (Blueprint $table) {
            $table->id();
            $table->string("name","100");
            $table->string("surname","100");
            $table->string("email","100");
            $table->string("phone_number","100");

            /*asignar clave foranea, revisar mismos datos y restricciones*/
            $table->unsignedBigInteger("supplier_id");
            $table->foreign('supplier_id')->references('id')->on('suppliers_table');
            $table->timestamps();


            // $table->foreignId('user_id')->constrained(); asume que es users
            //$table->foreignId('user_id')->constrained("users");

            // cambiar tipo de dato:
            //$table->integer('nombre_de_la_columna')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacs_table');
    }
};
