<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign3 extends Model
{
    use HasFactory;

    
    protected $table = 'nama_undangan_design3';

    protected $fillable = [
        'nama_undangan',
        'wedding_design3_id',
    ];
    public function weddingDesign1(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign3::class, 'wedding_design3_id', 'id');
    }
}
