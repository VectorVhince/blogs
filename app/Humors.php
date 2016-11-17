<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Humors extends Model
{
    public function humorsComments() {
    	return $this->hasMany('\App\HumorsComment', 'humors_id')->orderBy('id', 'desc');
    }
}
