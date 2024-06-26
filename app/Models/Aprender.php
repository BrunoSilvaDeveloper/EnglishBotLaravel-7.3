<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprender extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'rota',
        'imagem'
    ];
}
