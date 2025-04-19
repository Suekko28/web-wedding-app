<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign8 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design8';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design8_id'
    ];

    public function undanganAlt8RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign8::class, 'wedding_design8_id', 'id');
    }

}
