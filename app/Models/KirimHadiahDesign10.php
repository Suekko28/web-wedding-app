<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign10 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_design10';

    protected $fillable = [
        'alamat',
        'deskripsi_alamat',
        'informasi_design10_id',
    ];

    public function InformasiDesign10(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign10::class, 'informasi_design10_id', 'id');
    }

}
