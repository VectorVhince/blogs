<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = ['opinion_title', 'opinion_body', 'opinion_img'];

    public function comments() {
    	return $this->hasMany('\App\Comment', 'opinion_id')->orderBy('id', 'desc');
    }
}
