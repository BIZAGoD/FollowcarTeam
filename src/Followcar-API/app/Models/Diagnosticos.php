<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnosticos extends Model
{
    use HasFactory;
    protected $table = 'Diagnosticos';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'CitaId',
        'MecanicoId',
        'Estado',
        'DescripcionProblema',
        'DiagnosticoDetallado',
        'Recomendaciones',
        'FechaInicio',
        'FechaFin',
        'FotosEvidencia',
    ];

}
