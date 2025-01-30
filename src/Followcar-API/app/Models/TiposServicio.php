<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TiposServicio extends Model
{
    use HasFactory;
    protected $table = 'TiposServicio';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['Nombre', 'Descripcion'];
}
