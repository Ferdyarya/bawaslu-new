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
        Schema::create('suratpenugasans', function (Blueprint $table) {
            $table->id();
            $table->string('nosurat')->nullable();
            $table->date('tgltugas');
            $table->date('tglpelaksana');
            $table->string('tujuan');
            $table->text('deskripsi');
            $table->integer('id_petugas');
            $table->date('tglmulai');
            $table->date('tglselesai');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratpenugasans');
    }
};
