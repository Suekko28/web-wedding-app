<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerjalananCintaDesign5 extends Model
{
    use HasFactory;

    protected $table = 'perjalanan_cinta_design5';

    protected $fillable = [
        'image1',
        'tanggal',
        'judul_cerita',
        'deskripsi',
        'informasi_design5_id'
    ];

    public function InformasiDesign5(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign5::class, 'informasi_design5_id', 'id');
    }

}
