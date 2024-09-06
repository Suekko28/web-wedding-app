<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign2 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design2';

    protected $fillable = [
        'nama_undangan',
        'wedding_design2_id',
    ];
    public function weddingDesign2(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign2::class, 'wedding_design2_id', 'id');
    }
}
