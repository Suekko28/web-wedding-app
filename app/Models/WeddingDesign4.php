<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeddingDesign4 extends Model
{
    use HasFactory;

    protected $table = 'wedding_design4';

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
        'nama_penutup',
        'informasi_design4_id'

    ];

    public function InformasiDesign4(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign4::class, 'informasi_design4_id', 'id');
    }

    public function namaUndangan(): HasMany
    {
        return $this->hasMany(NamaUndanganDesign4::class, 'wedding_design4_id', 'id');
    }

    public function PerjalananCintaDesign4(): HasMany
    {
        return $this->hasMany(PerjalananCintaDesign4::class, 'informasi_design4_id', 'informasi_design4_id');
    }

    public function DirectTransferDesign4(): HasMany
    {
        return $this->hasMany(DirectTransferDesign4::class, 'informasi_design4_id', 'informasi_design4_id');
    }
    public function KirimHadiahDesign4(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign4::class, 'informasi_design4_id', 'informasi_design4_id');
    }

    public function alt4Models(): HasMany
    {
        return $this->hasMany(UcapanDesign4::class, 'wedding_design4_id', 'id');
    }



    // public function PerjalananCintaDesign4 () : HasMany 
    // {
    //     return $this->hasMany(PerjalananCintaDesign4::class, 'wedding_design4_id','id');
    // }


}
