<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'clasificacion',
        'item',
        'descripcion',
        'unidad_medida',
        'valor_prefijado_a',
        'valor_prefijado_b',
        'definicion',
        'cantidad',
        'valor_total',
    ];
}
