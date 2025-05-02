<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign5 extends Model
{
    use HasFactory;
    protected $table = 'informasi_design5';

    protected $fillable = [
        'id_weddingdesign5',
        'nama_pasangan',
        'slug_nama_pasangan',
        'tgl_pernikahan',

    ];

    public function KontenDesign5(): HasMany
    {
        return $this->hasMany(WeddingDesign5::class, 'informasi_design5_id', 'id');
    }
    public function PerjalananCintaDesign5(): HasMany
    {
        return $this->hasMany(PerjalananCintaDesign5::class, 'informasi_design5_id', 'id');
    }
    public function DirectTransferDesign5(): HasMany
    {
        return $this->hasMany(DirectTransferDesign5::class, 'informasi_design5_id', 'id');
    }

    public function KirimHadiahDesign5(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign5::class, 'informasi_design5_id', 'id');
    }

    public function weddingDesign5()
    {
        return $this->belongsTo(WeddingDesign5::class, 'id_weddingdesign5', 'id'); // Adjust the second parameter if necessary
    }

}
