<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign8 extends Model
{
    use HasFactory;

    protected $table = "informasi_design8";

    protected $fillable = [
        'id_weddingdesign8',
        'nama_pasangan',
        'tgl_pernikahan'
    ];

    public function KontenDesign8(): HasMany
    {
        return $this->hasMany(WeddingDesign8::class, 'informasi_design8_id', 'id');
    }

    public function DirectTransfterDesign8(): HasMany
    {
        return $this->hasMany(DirectTransferDesign8::class, 'informasi_design8_id', 'id');
    }
    public function KirimHadiahDesign8(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign8::class, 'informasi_design8_id', 'id');
    }

    public function weddingDesign8()
    {
        return $this->belongsTo(WeddingDesign8::class, 'id_weddingdesign8', 'id'); // Adjust the second parameter if necessary
    }

}
