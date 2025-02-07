<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CitasCliente extends Model
{
    use HasFactory;
    protected $table = 'CitasClientes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['Nombre', 'Apellido', 'Telefono', 'Email', 'Modelo', 'Marca', 'Anio', 'Placas', 'FechaCita'];
}
