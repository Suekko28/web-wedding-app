<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KirimHadiahDesign5 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_design5';

    protected $fillable = [

        'alamat',
        'deskripsi_alamat',
        'informasi_design5_id'
    ];

    public function InformasiDesign5(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign5::class, 'informasi_design5_id', 'id');
    }

}
