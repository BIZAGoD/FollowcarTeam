<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//Administración -> Movil, Web.

class Citas extends Model
{
    use HasFactory;
    protected $table = 'Citas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['ClienteId', 'VehiculoId', 'TipoServicioId', 'MecanicoId', 'FechaHora', 'Estado', 'MotivoCancelacion','ObservacionesCliente', 'ObservacionesInternas', 'Prioridad'];
}
