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
    protected $fillable = [
        'name', 'email', 'password',
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


    public function annonceur(){
        return $this->hasOne(Annonceur::class);
    }

     /**
     * Cette méthode va determiner si le user connecté a un role admin
     */
    public function isAdmin(){
        return strtolower(@$this->roles) === 'admin'? true : false;
    }

    /**
     * Cette méthode va determiner si le user connecté a un role moderator
     */
    public function isModerator(){
        return (strtolower(@$this->roles) === 'moderator' || strtolower(@$this->roles) === 'admin')? true : false;
    }
    /**
     * Cette méthode va determiner si le user connecté a un role Annonceur
     */
    public function isSeller(){
        return (strtolower(@$this->roles) === 'annonceur' || strtolower(@$this->roles) === 'admin')? true : false;
    }
}
