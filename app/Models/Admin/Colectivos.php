<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colectivos extends Model
{
    use HasFactory;
    public $table = 'Colectivos';
    protected $fillable = [
        'Nombre',
        'Codigo',
        'Colectivo',
        'Inicio',
        'Fin',
        'Tipo',
        'Subvencion',
        'Invitaciones',
        'LicenciaPromocion',
        'PrecioSub',
        'HorasSub',
        'Cerrado',
        'PrecioJugador',
        'Telefono',
        'Web',
        'Email',
        'email_contacto',
    ];

    /** Relaciones */

    public function clubes()
    {
        return $this->hasOne(ColectivosClubes::class, 'IdColectivo');
    }

    public function registrados()
    {
        return $this->hasMany(RegistradosColectivos::class, 'IdColectivo');
    }
}
