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
        Schema::create('perjalanan_cinta_design4', function (Blueprint $table) {
            $table->id();
            $table->string('image1');
            $table->string('image2');
            $table->date('tanggal');
            $table->string('judul_cerita');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanan_cinta_design4');
    }
};
