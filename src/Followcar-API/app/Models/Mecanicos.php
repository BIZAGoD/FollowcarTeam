<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanicos extends Model
{
    use HasFactory;
    protected $table = 'Mecanicos';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'Nombre',
        'Apellido',
        'Telefono',
        'Email',
    ];
}
