<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign10 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design10';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design10_id'
    ];

    public function undanganAlt10RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign10::class, 'wedding_design10_id', 'id');
    }

}
