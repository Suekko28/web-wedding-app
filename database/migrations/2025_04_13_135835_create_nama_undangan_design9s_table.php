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
        Schema::create('nama_undangan_design9', function (Blueprint $table) {
            $table->id();
            $table->text('nama_undangan');
            $table->string('slug_nama_undangan');
            $table->unsignedBigInteger('wedding_design9_id');
            $table->foreign('wedding_design9_id')
            ->references('id')
            ->on('wedding_design9')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_undangan_design9');
    }
};
