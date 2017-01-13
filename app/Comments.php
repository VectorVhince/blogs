<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function commentsPost() {
    	return $this->belongsTo('\App\Posts', 'post_id');
    }
}
