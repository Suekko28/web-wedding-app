<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndanganDigital extends Model
{
    use HasFactory;
    protected $table  = 'undangan_digital';

    protected $fillable = [
        'image',
        'judul',
        'harga',
        'link_preview',
        'link_pesan',
        'kategori'
    ];
}
