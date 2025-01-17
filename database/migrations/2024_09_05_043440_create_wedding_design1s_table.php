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
        Schema::create('wedding_design1', function (Blueprint $table) {
            $table->id();
            $table->string('id_weddingdesign1', 50);
            $table->string('banner_img');
            $table->string('foto_prewedding');
            $table->string('foto_mempelai_laki');
            $table->string('nama_mempelai_laki', 100);
            $table->string('putra_dari_bpk', 100);
            $table->string('putra_dari_ibu', 100);
            $table->string('foto_mempelai_perempuan');
            $table->string('nama_mempelai_perempuan', 100);
            $table->string('putri_dari_bpk', 100);
            $table->string('putri_dari_ibu', 100);
            $table->date('tgl_akad');
            $table->time('mulai_akad');
            $table->time('selesai_akad');
            $table->text('alamat_akad');
            $table->date('tgl_resepsi');
            $table->time('mulai_resepsi');
            $table->time('selesai_resepsi');
            $table->text('alamat_resepsi');
            $table->string('lokasi_gmaps_akad', 150);
            $table->string('lokasi_gmaps_resepsi', 150);
            $table->text('caption');
            $table->string('galeri_img1')->nullable();
            $table->string('galeri_img2')->nullable();
            $table->string('galeri_img3')->nullable();
            $table->string('galeri_img4')->nullable();
            $table->string('galeri_img5')->nullable();
            $table->string('galeri_img6')->nullable();
            $table->text('pertemuan')->nullable();
            $table->text('pendekatan')->nullable();
            $table->text('lamaran')->nullable();
            $table->text('pernikahan')->nullable();
            $table->string('nama_rek1', 50)->nullable();
            $table->integer('no_rek1')->nullable();
            $table->string('atas_nama1', 50)->nullable();
            $table->string('nama_rek2', 50)->nullable();
            $table->integer('no_rek2')->nullable();
            $table->string('atas_nama2', 50)->nullable();
            $table->string('nama_rek3', 50)->nullable();
            $table->integer('no_rek3')->nullable();
            $table->string('atas_nama3', 50)->nullable();
            $table->text('alamat_tertera')->nullable();
            $table->string('music');
            $table->string('foto_pertemuan')->nullable();
            $table->string('foto_pendekatan')->nullable();
            $table->string('foto_lamaran')->nullable();
            $table->string('foto_pernikahan')->nullable();
            $table->string('judul_cerita1', 50)->nullable();
            $table->string('judul_cerita2', 50)->nullable();
            $table->string('judul_cerita3', 50)->nullable();
            $table->string('judul_cerita4', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_design1');
    }
};
