<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $fillable = ['language'];

    public function books() {
    	return $this->belongsToMany('App\Book')->withTimestamps();
    }
}
