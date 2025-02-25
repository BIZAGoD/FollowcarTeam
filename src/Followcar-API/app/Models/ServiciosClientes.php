<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosClientes extends Model
{
    protected $table = 'ServiciosClientes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['taller', 'nombre', 'descripcion', 'estado', 'observacion', 'duracion', 'pieza', 'estado_pieza'];

}
