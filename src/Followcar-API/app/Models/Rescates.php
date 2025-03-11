<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescates extends Model
{
    protected $table = 'rescates';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nombre', 'email', 'fecha', 'problema', 'descripcion', 'estado', 'latitud', 'longitud'];
}
