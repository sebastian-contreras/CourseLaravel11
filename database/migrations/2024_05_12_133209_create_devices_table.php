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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->enum('Dispositivo', ['Celular', 'Computadora', 'Notebook', 'Netbook']);
            $table->string('Modelo');
            $table->string('anio');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
