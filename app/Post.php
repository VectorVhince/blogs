<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_title', 'post_body', 'post_created', 'post_author'];
}
