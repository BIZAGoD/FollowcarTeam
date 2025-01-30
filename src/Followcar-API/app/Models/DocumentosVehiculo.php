<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosVehiculo extends Model
{
    use HasFactory;
    protected $table = 'DocumentosVehiculo';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'VehiculoId',
        'Tipo',
        'ArchivoUrl',
        'FechaVencimiento',
    ];
}
