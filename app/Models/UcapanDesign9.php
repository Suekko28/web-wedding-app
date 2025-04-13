<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign9 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design9';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'wedding_design9_id'
    ];

    public function undanganAlt9RSVP(): BelongsTo
    {
        return $this->belongsTo(WeddingDesign9::class, 'wedding_design9_id', 'id');
    }

}
