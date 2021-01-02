<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'role','nomor_telepon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function beritas(){
        return $this->hasMany('App\Berita', 'id_pengguna');
    }
    public function demografis(){
        return $this->hasMany('App\Demografi', 'id_pengguna');
    }
    public function visi_misi(){
        return $this->hasMany('App\Visimisi', 'id_pengguna');
    }
}
