<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetakFoto extends Model
{
    use HasFactory;

    protected $table  = 'cetak_foto';

    protected $fillable = [
        'id_cetakfoto',
        'image',
        'judul',
        'harga',
        'link'
    ];
}
