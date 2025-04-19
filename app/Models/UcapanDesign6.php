<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign6 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design6';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design6_id'
    ];

    public function undanganAlt6RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign6::class, 'wedding_design6_id', 'id');
    }
}
