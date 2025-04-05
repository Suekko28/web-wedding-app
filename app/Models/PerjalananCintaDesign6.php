<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerjalananCintaDesign6 extends Model
{
    use HasFactory;

    protected $table = 'perjalanan_cinta_design6';

    protected $fillable = [
        'image',
    ];

    public function InformasiDesign6(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign6::class, 'informasi_design6_id', 'id');
    }

}
