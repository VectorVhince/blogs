<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
