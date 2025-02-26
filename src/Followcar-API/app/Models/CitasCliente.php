<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CitasCliente extends Model
{
    use HasFactory;
    protected $table = 'CitasClientes';
    protected $primaryKey = 'Email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['Email', 'Modelo', 'Marca', 'Anio', 'Placas', 'FechaCita'];
}
