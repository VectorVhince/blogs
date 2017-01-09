<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Humors extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function humorsComments() {
    	return $this->hasMany('\App\HumorsComment', 'humors_id')->orderBy('id', 'desc');
    }
}
