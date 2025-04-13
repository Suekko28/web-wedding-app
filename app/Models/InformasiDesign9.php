<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign9 extends Model
{
    use HasFactory;

    protected $table = "informasi_design9";

    protected $fillable = [
        'id_weddingdesign9',
        'nama_pasangan',
        'tgl_pernikahan'
    ];

    public function KontenDesign9(): HasMany
    {
        return $this->hasMany(WeddingDesign9::class, 'informasi_design9_id', 'id');
    }

    public function DirectTransfterDesign9(): HasMany
    {
        return $this->hasMany(DirectTransferDesign9::class, 'informasi_design9_id', 'id');
    }
    public function KirimHadiahDesign9(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign9::class, 'informasi_design9_id', 'id');
    }

    public function weddingDesign9()
    {
        return $this->belongsTo(WeddingDesign9::class, 'id_weddingdesign9', 'id'); // Adjust the second parameter if necessary
    }

}
