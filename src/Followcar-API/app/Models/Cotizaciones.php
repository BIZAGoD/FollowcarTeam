<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotizaciones extends Model
{
    use HasFactory;
    protected $table = 'Cotizaciones';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = ['DiagnosticoId', 'NumeroCotizacion', 'Subtotal','IVA','Total','Estado','MotivoRechazo', 'FechaAprobacion','FechaExpiracion'];
}
