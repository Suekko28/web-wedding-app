<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NamaUndanganDesign5 extends Model
{
    use HasFactory;

    protected $table = 'nama_undangan_design5';

    protected $fillable = [
        'nama_undangan',
        'wedding_design5_id',
    ];
    public function weddingDesign5(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign5::class, 'wedding_design5_id', 'id');
    }

}
