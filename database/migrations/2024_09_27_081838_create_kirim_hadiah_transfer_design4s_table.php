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
        Schema::create('kirim_hadiah_transfer_design4', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->integer('no_rek');
            $table->string('nama_rek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kirim_hadiah_transfer_design4');
    }
};
