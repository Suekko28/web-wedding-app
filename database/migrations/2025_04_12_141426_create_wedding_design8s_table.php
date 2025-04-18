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
        Schema::create('wedding_design8', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img');
            $table->string('foto_prewedding');
            $table->string('music');
            $table->string('foto_mempelai_perempuan');
            $table->string('nama_mempelai_perempuan');
            $table->string('putri_dari_bpk');
            $table->string('putri_dari_ibu');
            $table->string('nama_instagram1');
            $table->string('link_instagram1');
            $table->string('foto_mempelai_laki');
            $table->string('nama_mempelai_laki');
            $table->string('putra_dari_bpk');
            $table->string('putra_dari_ibu');
            $table->string('nama_instagram2');
            $table->string('link_instagram2');
            $table->string('akad_img');
            $table->date('tgl_akad');
            $table->time('mulai_akad');
            $table->time('selesai_akad');
            $table->string('lokasi_akad');
            $table->text('deskripsi_akad');
            $table->string('link_akad');
            $table->string('simpan_tgl_akad');
            $table->date('tgl_resepsi');
            $table->time('mulai_resepsi');
            $table->time('selesai_resepsi');
            $table->string('lokasi_resepsi');
            $table->text('deskripsi_resepsi');
            $table->string('link_resepsi');
            $table->string('simpan_tgl_resepsi');
            $table->string('judul_pembuka');
            $table->text('deskripsi_pembuka');
            $table->string('judul_cinta');
            $table->text('deskripsi_cinta');
            $table->text('image_cinta')->nullable();
            $table->string('link_streaming')->nullable();
            $table->string('judul_jadwal');
            $table->text('deskripsi_penutup');
            $table->unsignedBigInteger('informasi_design8_id');
            $table->foreign('informasi_design8_id')
                ->references('id')
                ->on('informasi_design8')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_design8');
    }
};
