<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'posts';

    public function userPost() {
    	return $this->belongsTo('\App\User', 'user_id');
    }

    public function comments() {
    	return $this->hasMany('\App\Comments', 'post_id')->withTrashed();
    }

    public function postMoods() {
        return $this->hasMany('\App\Mood','post_id');
    }

    public function imageExists() {
        if (file_exists(public_path('img/uploads/' . $this->image))) {
            return $this->image;
        }
        else {
            return 'default.jpg';
        }
    }

    public function thumbExists() {
        if (file_exists(public_path('img/uploads/thumbnails/' . $this->image))) {
            return $this->image;
        }
        else {
            return 'default.jpg';
        }
    }
}
