<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectTransferDesign8 extends Model
{
    use HasFactory;

    protected $table = 'direct_transfer_design8';

    protected $fillable = [

        'bank',
        'no_rek',
        'nama_rek',
        'informasi_design8_id'

    ];

    public function InformasiDesign8(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign8::class, 'informasi_design8_id', 'id');
    }

}
