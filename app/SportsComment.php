<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsComment extends Model
{
    public function sports()
    {
        return $this->belongsTo('App\Sports');
    }
}
