<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign8 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design8';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design8_id',
    ];
    public function weddingDesign8(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign8::class, 'wedding_design8_id', 'id');
    }

}
