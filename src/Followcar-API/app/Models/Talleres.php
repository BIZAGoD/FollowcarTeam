<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    protected $table = 'Talleres';
    protected $primaryKey = 'Nombre';
    public $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['Nombre', 'Direccion', 'Telefono', 'Email', 'Horario', 'Logo', 'Rescate'];
    
}