<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign7 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design7';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design7_id'
    ];

    public function undanganAlt7RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign7::class, 'wedding_design7_id', 'id');
    }

}
