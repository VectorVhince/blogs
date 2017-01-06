<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturesComment extends Model
{
    public function feature()
    {
        return $this->belongsTo('App\Features');
    }
}
