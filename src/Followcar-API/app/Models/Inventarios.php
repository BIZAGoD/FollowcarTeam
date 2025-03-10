<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventarios extends Model
{
    use HasFactory;
    protected $table = 'Inventarios';
    protected $primaryKey = 'Nombre';
    protected $keyType = 'string';
    public $incrementing = true;
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Cantidad',
        'Precio',
        'Categoria',
        'Proveedor'
    ];
}
