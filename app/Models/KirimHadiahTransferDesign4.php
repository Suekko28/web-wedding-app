<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimHadiahTransferDesign4 extends Model
{
    use HasFactory;

    protected $table = 'kirim_hadiah_transfer_design4';

    protected $fillable = [

        'bank',
        'no_rek',
        'nama_rek',

    ];
}


