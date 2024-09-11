<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seserahan extends Model
{
    use HasFactory;

    protected $table = 'seserahan';

    protected $fillable = [
        'image',
    ];
}
