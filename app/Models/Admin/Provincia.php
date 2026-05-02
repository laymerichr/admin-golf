<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public $table = 'Provincias';

    protected $fillable = [
        'IdProvincia',
        'Provincia',
        'IdComunidad'
    ];

    /** RELACIONES */

    public function clubes()
    {
        return $this->hasMany(Clubes::class, 'IdProvincia');
    }

    public function escuelas()
    {
        return $this->hasMany(Escuelas::class, 'IdProvincia');
    }

    public function comunidad()
    {
        return $this->belongsTo(Comunidad::class, 'IdComunidad', 'IdProvincia');
    }
}