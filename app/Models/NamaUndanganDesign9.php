<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign9 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design9';

    protected $fillable = [
        'nama_undangan',
        'slug_nama_undangan',
        'wedding_design9_id',
    ];
    public function weddingDesign9(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign9::class, 'wedding_design9_id', 'id');
    }

}
