<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign7 extends Model
{
    use HasFactory;
    
    protected $table = 'kirim_hadiah_design7';

    protected $fillable = [
        'alamat',
        'deskripsi_alamat',
        'informasi_design7_id',
    ];

    public function InformasiDesign7(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign7::class, 'informasi_design7_id', 'id');
    }

}
