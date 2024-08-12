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
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('nosurat')->nullable();
            $table->date('tglsurat');
            $table->date('tglkejadian');
            $table->string('keterangan');
            $table->string('pelaku');
            $table->string('kategori');
            $table->string('status')->nullable();
            $table->string('id_petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggarans');
    }
};
