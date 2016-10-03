<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    public function opinionComments() {
    	return $this->hasMany('\App\OpinionComment', 'opinion_id')->orderBy('id', 'desc');
    }
}
