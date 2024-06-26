<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frase extends Model
{
    use HasFactory;

    const NIVEL_FRASE = [
        1 => 'Básico',
        2 => 'Básico Avançado',
        3 => 'Intermediário',
        4 => 'Intermediário Avançado',
        5 => 'Fluente'
    ];

    protected $fillable = [
        'frase',
        'traducao',
        'nivel',
    ];
}
