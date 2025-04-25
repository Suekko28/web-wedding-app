<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign7 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design7';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design7_id',
    ];
    public function weddingDesign7(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign7::class, 'wedding_design7_id', 'id');
    }

}
