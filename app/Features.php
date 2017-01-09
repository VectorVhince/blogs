<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Features extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function featuresComments() {
    	return $this->hasMany('\App\FeaturesComment', 'features_id')->orderBy('id', 'desc');
    }
}
