<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    protected $table = 'Talleres';
    protected $primaryKey = 'Id';
    public $incrementing = true;
    protected $fillable = ['Nombre', 'Direccion', 'Telefono', 'Email', 'Horario', 'Logo'];
    public $timestamps = false;
}
