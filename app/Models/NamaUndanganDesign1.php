<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign1 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design1';

    protected $fillable = [
        'nama_undangan',
        'wedding_design1_id',
    ];
    public function weddingDesign1(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign1::class, 'wedding_design1_id', 'id');
    }
}
