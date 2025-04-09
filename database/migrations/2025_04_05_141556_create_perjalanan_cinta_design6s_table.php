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
        Schema::create('perjalanan_cinta_design6', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->text('image');
            $table->unsignedBigInteger('informasi_design6_id');
            $table->foreign('informasi_design6_id')
                ->references('id')
                ->on('informasi_design6')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanan_cinta_design6');
    }
};
