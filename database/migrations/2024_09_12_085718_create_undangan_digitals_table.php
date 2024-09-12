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
        Schema::create('undangan_digital', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('judul');
            $table->bigInteger('harga');
            $table->string('link_preview');
            $table->string('link_pesan');
            $table->integer('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangan_digital');
    }
};
