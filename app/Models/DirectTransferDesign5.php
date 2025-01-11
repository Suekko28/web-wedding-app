<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectTransferDesign5 extends Model
{
    use HasFactory;

    protected $table = 'direct_transfer_design5';

    protected $fillable = [

        'bank',
        'no_rek',
        'nama_rek',
        'informasi_design5_id'

    ];

    public function InformasiDesign5(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign5::class, 'informasi_design5_id', 'id');
    }

}
