<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clientes extends Authenticatable
{
    use HasFactory;

    protected $table = 'Clientes';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'contrasena',
        'estado'
    ];

    protected $hidden = [
        'contrasena',
    ];

    // 👇 clave para que Auth funcione con "contrasena"
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}


