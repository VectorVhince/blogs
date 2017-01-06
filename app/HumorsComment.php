<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HumorsComment extends Model
{
    public function humor()
    {
        return $this->belongsTo('App\Humors');
    }
}
