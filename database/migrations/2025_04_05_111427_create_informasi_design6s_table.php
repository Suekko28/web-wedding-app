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
        Schema::create('informasi_design6', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasangan', length: 100);
            $table->string('id_weddingdesign6', length: 100);
            $table->date('tgl_pernikahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_design6');
    }
};
