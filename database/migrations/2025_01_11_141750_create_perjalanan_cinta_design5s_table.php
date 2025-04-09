<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perjalanan_cinta_design5', function (Blueprint $table) {
            $table->id();
            $table->string('image1');
            $table->date('tanggal');
            $table->string('judul_cerita');
            $table->text('deskripsi');
            $table->unsignedBigInteger('informasi_design5_id');
            $table->foreign('informasi_design5_id')
                ->references('id')
                ->on('informasi_design5')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanan_cinta_design5');
    }
};
