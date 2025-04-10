<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign7 extends Model
{
    use HasFactory;

    protected $table = "informasi_design7";

    protected $fillable = [
        'id_weddingdesign7',
        'nama_pasangan',
        'tgl_pernikahan'
    ];

    public function KontenDesign7(): HasMany
    {
        return $this->hasMany(WeddingDesign7::class, 'informasi_design7_id', 'id');
    }

    public function DirectTransfterDesign7(): HasMany
    {
        return $this->hasMany(DirectTransferDesign7::class, 'informasi_design7_id', 'id');
    }
    public function KirimHadiahDesign7(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign7::class, 'informasi_design7_id', 'id');
    }

    public function weddingDesign7()
    {
        return $this->belongsTo(WeddingDesign7::class, 'id_weddingdesign7', 'id'); // Adjust the second parameter if necessary
    }

}
