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
        Schema::create('kirim_hadiah_design4', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->text('deskripsi_alamat');
            $table->unsignedBigInteger('informasi_design4_id');
            $table->foreign('informasi_design4_id')
                ->references('id')
                ->on('informasi_design4')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kirim_hadiah_design4');
    }
};
