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
        'name', 'username', 'email', 'password',
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
    public function userPosts(){
        return $this->[hasMany('\App\Editorials', 'user_id'),hasMany('\App\News', 'user_id')];
    }

    public function announcementsIndex(){
        return $this->hasMany('\App\Announcements', 'user_id')->orderBy('id', 'desc');
    }

}
