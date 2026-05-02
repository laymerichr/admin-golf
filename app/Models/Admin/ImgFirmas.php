<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgFirmas extends Model
{
    use HasFactory;

    public $table = 'img_firmas';
    protected $fillable = [
        'id_fed',
        'url'
    ];
}
