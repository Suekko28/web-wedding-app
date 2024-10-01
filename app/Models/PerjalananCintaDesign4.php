<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerjalananCintaDesign4 extends Model
{
    use HasFactory;

    protected $table = 'perjalanan_cinta_design4';

    protected $fillable = [
        'image1',
        'image2',
        'tanggal',
        'judul_cerita',
        'deskripsi',
        'informasi_design4_id'
    ];

    public function InformasiDesign4() : BelongsTo
    {
        return $this->belongsTo(InformasiDesign4::class, 'informasi_design4_id', 'id');
    }

    // public function KontenDesign4 () : BelongsTo
    // {
    //     return $this->belongsTo(WeddingDesign4::class, 'wedding_design4_id', 'id');
    // }
}
