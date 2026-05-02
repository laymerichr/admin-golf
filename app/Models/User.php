<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
   // use SoftDeletes;

    public $table = 'users';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_photo_path', 'NombreWeb', 'Activo', 'Bloqueado'
    ];

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     * @var array
     */
    protected $appends = [
        'profile_photo_path',
    ];


    /**
     * Audit threshold.
     *
     * @var int
     */
    protected $auditThreshold = 10;

    /**
     * adminlte_image()
     * show avatar
     * @return mixed
     */
    public function adminlte_image()
    {
        return \Illuminate\Support\Facades\Storage::disk('local')->url(Auth::user()['profile_photo_path']);
    }

    /**
     * adminlte_desc()
     *
     * show role
     * @return mixed
     */
    public function adminlte_desc()
    {
        return Auth::user()->getRoleNames()[0];
    }

    /**
     * adminlte_profile_url()
     *
     * show profile user
     * @return string
     */
    public function adminlte_profile_url()
    {
        return  route('users.profile');
    }


    /**
     * getNameAttribute($valor)
     * @param $valor
     * @return string
     */
    public function getNameAttribute($valor)
    {
        return ucwords($valor);
    }

    /**
     * setNameAttribute($valor)
     * @param $valor
     */
    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = Str::lower($valor);
    }


    /**
     * setEmailAttribute($valor)
     * @param $valor
     */
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = Str::lower($valor);
    }

    /**
     * getProfilePhotoPathAttribute($image)
     * @param $image
     * @return string
     */
    public function getProfilePhotoPathAttribute($profile_photo_path)
    {
        if($profile_photo_path == null)
            return '/assets/img/avatar/avatar.jpg';
        else
        { if(file_exists('storage/'.$profile_photo_path))
            return $profile_photo_path;
        else
            return '/assets/img/avatar/avatar.jpg';
        }

    }
}
