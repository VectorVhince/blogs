<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function newsComments() {
    	return $this->hasMany('\App\NewsComment', 'news_id')->orderBy('id', 'desc');
    }
}
