<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectTransferDesign10 extends Model
{
    use HasFactory;

    protected $table = 'direct_transfer_design10';

    protected $fillable = [

        'bank',
        'no_rek',
        'nama_rek',
        'informasi_design10_id'

    ];

    public function InformasiDesign10(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign10::class, 'informasi_design10_id', 'id');
    }

}
