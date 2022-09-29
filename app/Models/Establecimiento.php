<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
