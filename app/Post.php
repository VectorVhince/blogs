<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postComments() {
    	return $this->hasMany('\App\PostComment', 'post_id')->orderBy('id', 'desc');
    }
}
