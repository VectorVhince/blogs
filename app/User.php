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

    public function editorials(){
        return $this->hasMany('\App\Editorials', 'user_id')->orderBy('id', 'desc');
    }

    public function features(){
        return $this->hasMany('\App\Features', 'user_id')->orderBy('id', 'desc');
    }

    public function humors(){
        return $this->hasMany('\App\Humors', 'user_id')->orderBy('id', 'desc');
    }

    public function news(){
        return $this->hasMany('\App\News', 'user_id')->orderBy('id', 'desc');
    }

    public function opinions(){
        return $this->hasMany('\App\Opinion', 'user_id')->orderBy('id', 'desc');
    }

    public function sports(){
        return $this->hasMany('\App\Sports', 'user_id')->orderBy('id', 'desc');
    }

    public function announcements(){
        return $this->hasMany('\App\Announcements', 'user_id')->orderBy('id', 'desc');
    }

}
