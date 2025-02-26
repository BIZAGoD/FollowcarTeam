<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosClientes extends Model
{
    protected $table = 'ServiciosClientes';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['email', 'taller', 'nombre', 'descripcion', 'estado', 'observacion', 'duracion', 'pieza', 'estado_pieza'];
}
