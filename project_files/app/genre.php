<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $fillable = ['genre'];

    public function books() {
    	return $this->belongsToMany('App\Book')->withTimestamps();
    }

}
