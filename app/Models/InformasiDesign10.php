<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiDesign10 extends Model
{
    use HasFactory;

    protected $table = 'informasi_design10';

    protected $fillable = [
        'id_weddingdesign10',
        'nama_pasangan',
        'slug_nama_pasangan',
        'tgl_pernikahan',

    ];

    public function KontenDesign10(): HasMany
    {
        return $this->hasMany(WeddingDesign10::class, 'informasi_design10_id', 'id');
    }
    public function DresscodeDesign10(): HasMany
    {
        return $this->hasMany(DresscodeDesign10::class, 'informasi_design10_id', 'informasi_design10_id');
    }
    public function DirectTransferesign4(): HasMany
    {
        return $this->hasMany(DirectTransferDesign10::class, 'informasi_design10_id', 'id');
    }

    public function KirimHadiahDesign10(): HasMany
    {
        return $this->hasMany(KirimHadiahDesign10::class, 'informasi_design10_id', 'id');
    }

    public function weddingDesign10()
    {
        return $this->belongsTo(WeddingDesign10::class, 'id_weddingdesign10', 'id'); // Adjust the second parameter if necessary
    }

}
