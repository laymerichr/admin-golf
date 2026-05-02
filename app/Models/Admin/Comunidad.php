<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;

    public $table = 'Comunidades';

    protected $fillable = [
        'IdComunidad',
        'Comunidad'
    ];

    /** RELACIONES */

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'IdComunidad');
    }
}