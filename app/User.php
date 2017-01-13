<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Date
    public function postsUser(){
        return $this->hasMany('\App\Posts', 'user_id');
    }

    public function announcementsIndex(){
        return $this->hasMany('\App\Announcements', 'user_id')->orderBy('id', 'desc');
    }

}
