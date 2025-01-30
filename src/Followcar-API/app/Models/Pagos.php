<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;
    protected $table = 'Pagos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['FacturaId', 'Monto', 'FechaPago', 'MetodoPago','Estado'];
}
