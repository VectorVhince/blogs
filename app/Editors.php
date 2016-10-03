<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editors extends Model
{
    public function editorsComments() {
    	return $this->hasMany('\App\EditorsComment', 'editors_id')->orderBy('id', 'desc');
    }
}
