<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','email','sexo','area_id','boletin','descripcion'
    ];

    public $timestamps = false;
}
