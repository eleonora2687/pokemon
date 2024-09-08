<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'types',
        'image',
        'weight',
        'height',
        'stats',
        'is_favorite'
    ];
}
