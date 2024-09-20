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
        Schema::create('cetak_foto', function (Blueprint $table) {
            $table->id();
            $table->string('id_cetakfoto', 100);
            $table->string('image');
            $table->string('judul');
            $table->bigInteger('harga');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cetak_foto');
    }
};
