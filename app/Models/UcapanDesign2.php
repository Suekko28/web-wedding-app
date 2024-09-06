<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign2 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design2';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design2_id',
    ];

    public function undanganAlt2RSVP(): BelongsTo {
        return $this->belongsTo(WeddingDesign2::class, 'wedding_design2_id', 'id');
    }
}
