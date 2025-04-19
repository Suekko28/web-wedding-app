<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign9 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_design9';

    protected $fillable = [
        'alamat',
        'deskripsi_alamat',
        'informasi_design9_id',
    ];

    public function InformasiDesign9(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign9::class, 'informasi_design9_id', 'id');
    }

}
