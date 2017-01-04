<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorials extends Model
{
    public function editorialsComments() {
    	return $this->hasMany('\App\EditorialsComment', 'editorials_id')->orderBy('id', 'desc');
    }
}
