<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['surname','firstnames'];

    /*
        Relationship with Authors
    */
    public function books() {
    	return $this->hasMany('App\Book');
    }
}
