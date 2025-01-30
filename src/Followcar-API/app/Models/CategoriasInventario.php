<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriasInventario extends Model
{
    use HasFactory;
    protected $table = 'CategoriasInventario';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;
    
}
