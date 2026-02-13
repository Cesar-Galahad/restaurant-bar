<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Authenticatable
{
    use HasFactory;

    protected $table = 'Empleado'; // si tu tabla realmente se llama así
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'usuario',
        'correo',
        'contrasena',
        'rol',
        'estado'
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
