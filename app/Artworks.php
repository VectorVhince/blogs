<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artworks extends Model
{
    public function artworksComments() {
    	return $this->hasMany('\App\ArtworksComment', 'artworks_id')->orderBy('id', 'desc');
    }
}
