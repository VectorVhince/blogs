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
    public function newsDate(){
        return $this->hasMany('\App\News', 'user_id');
    }
    public function editorialDate(){
        return $this->hasMany('\App\Editorials', 'user_id');
    }
    public function opinionDate(){
        return $this->hasMany('\App\Opinion', 'user_id');
    }
    public function featureDate(){
        return $this->hasMany('\App\Features', 'user_id');
    }
    public function humorDate(){
        return $this->hasMany('\App\Humors', 'user_id');
    }
    public function sportsDate(){
        return $this->hasMany('\App\Sports', 'user_id');
    }

    // Name
    public function newsName(){
        return $this->hasMany('\App\News', 'user_id');
    }
    public function editorialName(){
        return $this->hasMany('\App\Editorials', 'user_id');
    }
    public function opinionName(){
        return $this->hasMany('\App\Opinion', 'user_id');
    }
    public function featureName(){
        return $this->hasMany('\App\Features', 'user_id');
    }
    public function humorName(){
        return $this->hasMany('\App\Humors', 'user_id');
    }
    public function sportsName(){
        return $this->hasMany('\App\Sports', 'user_id');
    }

    public function announcementsIndex(){
        return $this->hasMany('\App\Announcements', 'user_id')->orderBy('id', 'desc');
    }

}
