<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuelas extends Model
{
    use HasFactory;

    public $table = 'Escuelas';

    protected $fillable = [
        'NombreWeb',
        'CodClub',
        'NombreClub',
        'NombreEscuela',
        'ColorWeb',
        'Activo',
        'FechaAlta',
        'IdFed',
        'EscuelaJuvenil',
        'GolfColegios',
        'BecasGolfColegios',
        'Holagolf',
        'Colectivos',
        'FriendsCup',
        'NombreWebOrig',
        'CIF',
        'NombreFacturacion',
        'Municipio',
        'DireccionFacturacion',
        'CodigoPostal',
        'IdProvincia',
        'Localidad',
        'Direccion',
        'Telefono',
        'Web',
        'Email',
    ];

    /** RELACIONES */

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'NombreWeb', 'IdProvincia');
    }

    public function federacion()
    {
        return $this->belongsTo(FederacionTerritorial::class, 'NombreWeb', 'IdFed');
    }
}
