<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    public function sportsComments() {
    	return $this->hasMany('\App\SportsComment', 'sports_id')->orderBy('id', 'desc');
    }
}
