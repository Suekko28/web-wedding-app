<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign8 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_design8';

    protected $fillable = [
        'alamat',
        'deskripsi_alamat',
        'informasi_design8_id',
    ];

    public function InformasiDesign8(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign8::class, 'informasi_design8_id', 'id');
    }

}
