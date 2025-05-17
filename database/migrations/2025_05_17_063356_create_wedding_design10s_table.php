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
        Schema::create('wedding_design10', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img');
            $table->string('foto_prewedding');
            $table->text('image_hero');
            $table->string('music');
            $table->string('foto_mempelai_perempuan')->nullable();
            $table->string('nama_mempelai_perempuan');
            $table->string('putri_dari_bpk');
            $table->string('putri_dari_ibu');
            $table->string('nama_instagram1')->nullable();
            $table->string('link_instagram1')->nullable();
            $table->string('foto_mempelai_laki')->nullable();
            $table->string('nama_mempelai_laki');
            $table->string('putra_dari_bpk');
            $table->string('putra_dari_ibu');
            $table->string('nama_instagram2')->nullable();
            $table->string('link_instagram2')->nullable();
            $table->string('akad_img')->nullable();
            $table->string('judul_akad')->nullable();
            $table->date('tgl_akad');
            $table->time('mulai_akad');
            $table->time('selesai_akad');
            $table->string('lokasi_akad');
            $table->text('deskripsi_akad');
            $table->string('link_akad');
            $table->text('simpan_tgl_akad');
            $table->string('judul_resepsi')->nullable();
            $table->date('tgl_resepsi');
            $table->time('mulai_resepsi');
            $table->time('selesai_resepsi');
            $table->string('lokasi_resepsi');
            $table->text('deskripsi_resepsi');
            $table->string('link_resepsi');
            $table->text('simpan_tgl_resepsi');
            $table->string('judul_pembuka');
            $table->text('deskripsi_pembuka');
            $table->string('judul_cinta')->nullable();
            $table->text('deskripsi_cinta')->nullable();
            $table->string('link_cinta')->nullable();
            $table->text('image_cinta')->nullable();
            $table->string('instagram_streaming')->nullable();
            $table->string('youtube_streaming')->nullable();
            $table->string('zoom_streaming')->nullable();
            $table->string('judul_jadwal');
            $table->text('deskripsi_penutup');
            $table->integer('zona_waktu_akad');
            $table->integer('zona_waktu_resepsi');
            $table->string('nama_penutup');
            $table->text('deskripsi_quote')->nullable();
            $table->string('judul_quote')->nullable();
            $table->unsignedBigInteger('informasi_design10_id');
            $table->foreign('informasi_design10_id')
                ->references('id')
                ->on('informasi_design10')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_design10');
    }
};
