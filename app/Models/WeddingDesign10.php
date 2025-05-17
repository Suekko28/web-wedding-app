<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeddingDesign10 extends Model
{
    use HasFactory;

    protected $table = 'wedding_design10';

    protected $fillable = [
        'banner_img',
        'foto_prewedding',
        'image_hero',
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
        'judul_akad',
        'tgl_akad',
        'mulai_akad',
        'selesai_akad',
        'lokasi_akad',
        'deskripsi_akad',
        'link_akad',
        'simpan_tgl_akad',
        'judul_resepsi',
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
        'link_cinta',
        'image_cinta',
        'instagram_streaming',
        'youtube_streaming',
        'zoom_streaming',
        'judul_jadwal',
        'deskripsi_penutup',
        'zona_waktu_akad',
        'zona_waktu_resepsi',
        'nama_penutup',
        'deskripsi_quote',
        'judul_quote',
        'informasi_design10_id',
    ];

    public function InformasiDesign10(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign10::class, 'informasi_design10_id', 'id');
    }

    public function namaUndangan(): HasMany
    {
        return $this->hasMany(NamaUndanganDesign10::class, 'wedding_design10_id', 'id');
    }

    public function DresscodeDesign10(): HasMany
    {
        return $this->hasMany(DresscodeDesign10::class, 'informasi_design10_id', 'informasi_design10_id');
    }

    public function DirectTransferDesign10(): HasMany
    {
        return $this->hasMany(DirectTransferDesign10::class, 'informasi_design10_id', 'informasi_design10_id');
    }
    public function KirimHadiahDesign10(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign10::class, 'informasi_design10_id', 'informasi_design10_id');
    }

    public function alt10Models(): HasMany
    {
        return $this->hasMany(UcapanDesign10::class, 'wedding_design10_id', 'id');
    }

}
