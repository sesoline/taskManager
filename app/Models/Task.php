<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Detalle',
        'Fecha_limite',
        'usuario_id',
    ];
}
