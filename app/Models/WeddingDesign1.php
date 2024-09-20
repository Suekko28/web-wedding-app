<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeddingDesign1 extends Model
{
    use HasFactory;

    protected $table = 'wedding_design1';

    protected $fillable = [
        // 'nama_undangan',
        'id_weddingdesign1',
        'banner_img',
        'foto_prewedding',
        'foto_mempelai_laki',
        'nama_mempelai_laki',
        'putra_dari_bpk',
        'putra_dari_ibu',
        'foto_mempelai_perempuan',
        'nama_mempelai_perempuan',
        'putri_dari_bpk',
        'putri_dari_ibu',
        'tgl_akad',
        'alamat_akad',
        'tgl_resepsi',
        'alamat_resepsi',
        'lokasi_gmaps_akad',
        'lokasi_gmaps_resepsi',
        'caption',
        'galeri_img1',
        'galeri_img2',
        'galeri_img3',
        'galeri_img4',
        'galeri_img5',
        'galeri_img6',
        'pertemuan',
        'pendekatan',
        'lamaran',
        'pernikahan',
        'nama_rek1',
        'no_rek1',
        'atas_nama1',
        'nama_rek2',
        'no_rek2',
        'atas_nama2',
        'nama_rek3',
        'no_rek3',
        'atas_nama3',
        'alamat_tertera',
        'mulai_akad',
        'selesai_akad',
        'mulai_resepsi',
        'selesai_resepsi',
        'music',
        'foto_pertemuan',
        'foto_pendekatan',
        'foto_lamaran',
        'foto_pernikahan',
        'judul_cerita1',
        'judul_cerita2',
        'judul_cerita3',
        'judul_cerita4',
    ];

    public function namaUndangan(): HasMany
    {
        return $this->hasMany(NamaUndanganDesign1::class, 'wedding_design1_id', 'id');
    }

    public function alt1Models(): HasMany
    {
        return $this->hasMany(UcapanDesign1::class, 'wedding_design1_id', 'id');
    }

}
