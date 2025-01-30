<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetallesCotizaciones extends Model
{
    use HasFactory;
    protected $table = 'DetallesCotizaciones';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = ['CotizacionId', 'Tipo', 'PiezaId', 'ServicioId', 'Descripcion','Cantidad','PrecioUnitario','Subtotal','Notas'];
}
