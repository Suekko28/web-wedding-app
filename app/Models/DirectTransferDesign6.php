<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectTransferDesign6 extends Model
{
    use HasFactory;

    protected $table = 'direct_transfer_design6';

    protected $fillable = [

        'bank',
        'no_rek',
        'nama_rek',
        'informasi_design6_id'

    ];

    public function InformasiDesign5(): BelongsTo
    {
        return $this->belongsTo(InformasiDesign6::class, 'informasi_design6_id', 'id');
    }

}
