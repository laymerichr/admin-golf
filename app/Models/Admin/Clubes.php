<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubes extends Model
{
    use HasFactory;

    public $table = 'Clubes';

    protected $fillable = [
        'CodClub',
        'Club',
        'IdProvincia',
        'IdComunidad',
        'Becado',
        'Direccion',
        'CodPostal',
        'Telefono',
        'Fax',
        'Email',
        'GPS',
        'Web',
        'Presidente',
        'Persona_Contacto',
        'Persona_Cargo',
        'Campo',
        'url_inscripcion_fc',
        'Golf_Colegios',
        'IdIsla',
        'created_at',
        'updated_at',
        'id'
    ];

    /** RELACIONES */

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'CodClub', 'IdProvincia');
    }
}
