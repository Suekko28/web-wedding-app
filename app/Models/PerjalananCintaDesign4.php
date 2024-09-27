<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerjalananCintaDesign4 extends Model
{
    use HasFactory;

    protected $table = 'perjalanan_cinta_design4';

    protected $fillable = [
        
        'image1',
        'image2',
        'tanggal',
        'judul cerita',
        'deskripsi',
    ];
}
