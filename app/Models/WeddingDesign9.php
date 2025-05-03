<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeddingDesign9 extends Model
{
    use HasFactory;

    protected $table = 'wedding_design9';

    protected $fillable = [
        'banner_img',
        'music',
        'foto_mempelai_perempuan',
        'nama_mempelai_perempuan',
        'putri_dari_bpk',
        'putri_dari_ibu',
        'nama_instagram1',
        'link_instagram1',
        'foto_mempelai_laki',
        'nama_mempelai_laki',
        'putra_dari_bpk',
        'putra_dari_ibu',
        'nama_instagram2',
        'link_instagram2',
        'akad_img',
        'tgl_akad',
        'mulai_akad',
        'selesai_akad',
        'lokasi_akad',
        'deskripsi_akad',
        'link_akad',
        'simpan_tgl_akad',
        'tgl_resepsi',
        'mulai_resepsi',
        'selesai_resepsi',
        'lokasi_resepsi',
        'deskripsi_resepsi',
        'link_resepsi',
        'simpan_tgl_resepsi',
        'judul_pembuka',
        'deskripsi_pembuka',
        'judul_cinta',
        'deskripsi_cinta',
        'image_cinta',
        'link_streaming',
        'judul_jadwal',
        'deskripsi_penutup',
        'judul_akad',
        'judul_resepsi',
        'zona_waktu_akad',
        'zona_waktu_resepsi',
        'nama_penutup',
        'informasi_design9_id'

    ];

    public function InformasiDesign9(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign9::class, 'informasi_design9_id', 'id');
    }

    public function namaUndangan(): HasMany
    {
        return $this->hasMany(NamaUndanganDesign9::class, 'wedding_design9_id', 'id');
    }

    public function DirectTransferDesign9(): HasMany
    {
        return $this->hasMany(DirectTransferDesign9::class, 'informasi_design9_id', 'informasi_design9_id');
    }
    public function KirimHadiahDesign9(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign9::class, 'informasi_design9_id', 'informasi_design9_id');
    }

    public function alt9Models(): HasMany
    {
        return $this->hasMany(UcapanDesign9::class, 'wedding_design9_id', 'id');
    }

}
