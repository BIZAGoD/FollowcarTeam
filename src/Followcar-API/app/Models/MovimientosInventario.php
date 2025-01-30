<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class movimientosinventario extends Model
{
    use HasFactory;
    protected $table = 'MovimientosInventario';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'InventarioId',
        'TipoMovimiento',
        'Cantidad',
        'FechaMovimiento',
        'Descripcion',
    ];
}
