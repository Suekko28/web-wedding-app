<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign4 extends Model
{
    use HasFactory;

    protected $table = 'informasi_design4';

    protected $fillable = [
        'id_weddingdesign4',
        'nama_pasangan',
        'tgl_pernikahan',

    ];

    public function KontenDesign4() : HasMany 
    {
        return $this->hasMany(WeddingDesign4::class, 'informasi_design4_id', 'id');
    }
    public function PerjalananCintaDesign4() : HasMany 
    {
        return $this->hasMany(PerjalananCintaDesign4::class, 'informasi_design4_id', 'id');
    }
    public function DirectTransferesign4() : HasMany 
    {
        return $this->hasMany(DirectTransferDesign4::class, 'informasi_design4_id', 'id');
    }

    public function KirimHadiahDesign4() : HasMany 
    {
        return $this->hasMany(KirimHadiahDesign4::class, 'informasi_design4_id', 'id');
    }

}
