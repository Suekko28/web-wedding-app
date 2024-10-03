<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign4 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_design4';

    protected $fillable = [

        'alamat',
        'deskripsi_alamat',
        'informasi_design4_id'
    ];

    public function InformasiDesign4() : BelongsTo
    {
        return $this->belongsTo(InformasiDesign4::class, 'informasi_design4_id', 'id');
    }

}
