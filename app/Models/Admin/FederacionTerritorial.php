<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederacionTerritorial extends Model
{
    use HasFactory;
    public $table = 'FedTerritoriales';

    protected $fillable = [
        'IdFed',
        'Federacion',
        'Presidente',
        'Firma',
    ];

    /** RELACIONES */
    public function escuelas()
    {
        return $this->hasMany(Escuelas::class, 'IdFed');
    }
}