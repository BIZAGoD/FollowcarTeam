<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facturas extends Model
{
    use HasFactory;
    protected $table = 'Facturas';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = ['Id', 'ClienteId', 'Fecha', 'Total', 'Estado'];
}
