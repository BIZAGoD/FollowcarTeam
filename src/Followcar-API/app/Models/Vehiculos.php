<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculos extends Model
{
    use HasFactory;
    protected $table = 'Vehiculos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['Modelo', 'Marca', 'Anio', 'Color', 'Placa'];
}
