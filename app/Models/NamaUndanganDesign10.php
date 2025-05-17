<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign10 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design10';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design10_id',
    ];
    public function weddingDesign10(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign10::class, 'wedding_design10_id', 'id');
    }

}
