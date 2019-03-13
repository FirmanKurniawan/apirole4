<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'api_token', 'noktp', 'status', 'remember_token', 'nama', 'tanggal_lahir', 'fotoktp', 'noktp', 'alamat', 'jeniskelamin', 'fotopribadi',
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

    public function isAdmin()
    {
        if($this->role == 1) return true;
        return false;
    }

    public function isOperator()
    {
        if($this->role == 2) return true;
        return false;
    }

    public function isCustomer()
    {
        if($this->role == 3) return true;
        return false;
    }

    public function isClient()
    {
        if($this->role == 4) return true;
        return false;
    }
}
