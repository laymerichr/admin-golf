<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgLogo extends Model
{
    use HasFactory;

    public $table = 'img_logo';
    protected $fillable = [
        'club_code',
        'url'
    ];
}
