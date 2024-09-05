<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign1 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design1';

    protected $fillable = [
        'nama',
        'ucapan',
        'kehadiran',
        'undangan_alt1_id',
    ];

    public function undanganAlt1RSVP(): BelongsTo {
        return $this->belongsTo(WeddingDesign1::class, 'wedding_design1_id', 'id');
    }
}
