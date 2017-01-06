<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpinionComment extends Model
{
    public function opinion()
    {
        return $this->belongsTo('App\Opinion');
    }
}
