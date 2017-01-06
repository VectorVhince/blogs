<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditorialsComment extends Model
{
    public function editorial()
    {
        return $this->belongsTo('App\Editorials');
    }
}
