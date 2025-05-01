<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign4 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design4';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design4_id',
    ];
    public function weddingDesign4(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign4::class, 'wedding_design4_id', 'id');
    }
    public function informasiDesign4(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign4::class, 'wedding_design4_id', 'id');
    }
}
