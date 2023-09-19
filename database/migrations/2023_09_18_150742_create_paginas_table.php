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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('url_imagen_principal');
            $table->string('url_calendario_academico');
            $table->string('url_plan_estudio');
            $table->string('url_facebook')->nullable();
            $table->string('url_whatsapp')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_imagen')->nullable();
            $table->string('nombre_calendario')->nullable();
            $table->string('nombre_plan_estudio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
