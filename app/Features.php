<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    public function featuresComments() {
    	return $this->hasMany('\App\FeaturesComment', 'features_id')->orderBy('id', 'desc');
    }
}
