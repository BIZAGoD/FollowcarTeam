<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriasServicio extends Model
{
    use HasFactory;
    protected $table = 'CategoriasServicio';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nombre', 'descripcion', 'icono'];
    public $timestamps = false;

}
