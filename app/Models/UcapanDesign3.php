<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UcapanDesign3 extends Model
{
    use HasFactory;

    protected $table = 'ucapan_design3';

    protected $fillable = [
        'nama',
        'alamat',
        'ucapan',
        'wedding_design3_id',
    ];

    public function undanganAlt3RSVP(): BelongsTo {
        return $this->belongsTo(WeddingDesign3::class, 'wedding_design3_id', 'id');
    }

}
