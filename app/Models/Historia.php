<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    const NIVEL_HISTORIA = [
        1 => 'Básico',
        2 => 'Básico Avançado',
        3 => 'Intermediário',
        4 => 'Intermediário Avançado',
        5 => 'Fluente'
    ];

    protected $fillable = [
        'historia',
        'traducao',
        'nivel',
    ];
}
