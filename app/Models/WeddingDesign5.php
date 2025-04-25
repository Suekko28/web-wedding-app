<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeddingDesign5 extends Model
{
    use HasFactory;

    protected $table = 'wedding_design5';

    protected $fillable = [
        'banner_img',
        'foto_prewedding',
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
        'quote',
        'quote_img',
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
        'link_streaming',
        'judul_akad',
        'judul_resepsi',
        'judul_jadwal',
        'deskripsi_penutup',
        'zona_waktu_akad',
        'zona_waktu_resepsi',
        'slug_nama_mempelai_laki',
        'slug_nama_mempelai_perempuan',
        'informasi_design5_id'

    ];

    public function InformasiDesign5(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign5::class, 'informasi_design5_id', 'id');
    }

    public function namaUndangan(): HasMany
    {
        return $this->hasMany(NamaUndanganDesign5::class, 'wedding_design5_id', 'id');
    }

    public function PerjalananCintaDesign5(): HasMany
    {
        return $this->hasMany(PerjalananCintaDesign5::class, 'informasi_design5_id', 'informasi_design5_id');
    }

    public function DirectTransferDesign5(): HasMany
    {
        return $this->hasMany(DirectTransferDesign5::class, 'informasi_design5_id', 'informasi_design5_id');
    }
    public function KirimHadiahDesign5(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign5::class, 'informasi_design5_id', 'informasi_design5_id');
    }

    public function alt5Models(): HasMany
    {
        return $this->hasMany(UcapanDesign5::class, 'wedding_design5_id', 'id');
    }

}
