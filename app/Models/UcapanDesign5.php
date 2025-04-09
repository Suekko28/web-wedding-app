<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign5 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design5';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design5_id',
    ];

    public function undanganAlt5RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign5::class, 'wedding_design5_id', 'id');
    }

}
