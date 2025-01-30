<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notificaciones extends Model
{
    use HasFactory;
    protected $table = 'Notificaciones';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'UsuarioId',
        'Mensaje',
        'FechaEnvio',
        'Estado',
    ];
}
