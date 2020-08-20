<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['language'];

    public function books() {
    	return $this->belongsToMany('App\Book')->withTimestamps();
    }
}
