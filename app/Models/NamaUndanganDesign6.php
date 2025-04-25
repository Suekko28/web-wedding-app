<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign6 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design6';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design6_id',
    ];
    public function weddingDesign6(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign6::class, 'wedding_design6_id', 'id');
    }
}
