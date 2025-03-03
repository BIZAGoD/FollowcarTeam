<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescates extends Model
{
    protected $table = 'rescates';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nombre', 'taller', 'email', 'fecha', 'lugar', 'estado'];
}
