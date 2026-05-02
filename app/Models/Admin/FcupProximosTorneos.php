<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcupProximosTorneos extends Model
{
    use HasFactory;
    public $table = 'fcup_proximos_torneos';
    protected $fillable = [
        'torneo',
        'clubcode',
        'web',
        'club',
        'fecha0',
        'fecha1',
        'hora_creacion',
        'direccion',
        'telefono_contacto',
        'invitaciones',
        'fecha0ins',
        'fecha1ins',
        'precio_torneo',
        'numero_hoyos',
        'hoyo_salida',
        'premio_torneo',
        'comienzo_hom',
        'comienzo_muj',
        'min_entre_salida',
        'num_max_parejas',
        'max_parejas_salida',
        'recorrido_campo',
        'tipo',
        'tipo_puntuacion',
        'modalidad',
        'femenino',
        'masculino',
        'juvenil',
        'senior',
        'pitchandputt',
        'golfadaptado',
        'profesional',
        'resaltar',
        'torneo_activo_susp',
        'torneo_abierto_cerrado',
        'inscrip_online',
        'visible',
        'url',
        'noticia',
        'fichero',
        'desfichero',
        'fichero2',
        'desfichero2',
        'fichero3',
        'desfichero3',
        'fichero4',
        'desfichero4',
        'fichero5',
        'desfichero5',
        'fichero6',
        'desfichero6',
        'fichero7',
        'desfichero7',
        'fichero8',
        'desfichero8',
        'Text_Area',
        'CreadoPor'
    ];

    /** Relaciones */

    public function fcupTorneosJugadoresParejas()
    {
        return $this->hasMany(FcupTorneosJugadoresParejas::class, 'id_torneo');
    }

    public function posters()
    {
        return $this->hasMany(Poster::class, 'id_torneo');
    }

    public function registrados()
    {
        return $this->hasMany(RegistradosFriendsCup::class, 'IdFriendsCup');
    }

    public function patrocinadores()
    {
        return $this->hasOne(Patrocinador::class, 'id_torneo');
    }

    public function invitacionesTorneo()
    {
        return $this->hasMany(InvitacionesFriendClub::class, 'IdFriendsCup');
    }

}
