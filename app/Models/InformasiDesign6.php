<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InformasiDesign6 extends Model
{
    use HasFactory;

    protected $table = "informasi_design6";

    protected $fillable = [
        'id_weddingdesign6',
        'nama_pasangan',
        'tgl_pernikahan'
    ];

    public function KontenDesign6(): HasMany
    {
        return $this->hasMany(WeddingDesign6::class, 'informasi_design6_id', 'id');
    }

    public function PerjalananCintaDesign6(): HasOne
    {
        return $this->hasOne(InformasiDesign6::class, 'informasi_design6_id', 'id');
    }
    public function DirectTransfterDesign6(): HasOne
    {
        return $this->hasOne(InformasiDesign6::class, 'informasi_design6_id', 'id');
    }
    public function KirimHadiahDesign6(): HasOne
    {
        return $this->hasOne(InformasiDesign6::class, 'informasi_design6_id', 'id');
    }

    public function weddingDesign6()
    {
        return $this->belongsTo(WeddingDesign6::class, 'id_weddingdesign6', 'id'); // Adjust the second parameter if necessary
    }


}
