<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambarin extends Model
{
    use HasFactory;

    protected $table  = 'gambarin';

    protected $fillable = [
        'image',
        'id_gambarin',
        'judul',
        'harga',
        'link',
    ];
}
