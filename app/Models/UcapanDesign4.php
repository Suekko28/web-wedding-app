<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign4 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design4';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design4_id',
    ];

    public function undanganAlt4RSVP(): BelongsTo {
        return $this->belongsTo(WeddingDesign4::class, 'wedding_design4_id', 'id');
    }
}
