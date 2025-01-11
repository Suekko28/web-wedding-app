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
        Schema::create('ucapan_design5', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_design5_id');
            $table->foreign('wedding_design5_id')
                ->references('id')
                ->on('wedding_design5')
                ->onDelete('cascade');
            $table->string('nama', 100);
            $table->text('ucapan');
            $table->integer('kehadiran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucapan_design5');
    }
};
