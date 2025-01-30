<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;
    protected $table = 'Mensajes';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'Contenido',
        'RemitenteId',
        'DestinatarioId',
        'FechaEnvio',
        'Estado',
    ];
}
