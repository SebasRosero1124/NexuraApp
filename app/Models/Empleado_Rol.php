<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Rol extends Model
{
    use HasFactory;

    protected $primaryKey = 'empleado_id';

    protected $table = 'empleado_rol';

    protected $fillable = [
        'empleado_id','rol_id'
    ];

    public $timestamps = false;
}
