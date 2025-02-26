<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'Usuarios';
    protected $primaryKey = 'Email';
    public $incrementing = false; // Important for string primary keys
    protected $keyType = 'string';
    protected $fillable = ['Email', 'Nombre', 'Apellido', 'Telefono', 'Clave', 'Imagen'];
}
