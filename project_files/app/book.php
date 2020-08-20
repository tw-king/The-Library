<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    /*
        Columns we want to populate
    */
    protected $fillable = ['title','author_id','isbn','pubyear'];

    /*
        Relationship with Authors
    */
    public function author() {
    	return $this->belongsTo('App\Author');
    }

    /*
        Relationship with Genres
    */
    public function genres() {
    	return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    /*
        Relationship with Languages
    */
    public function languages() {
    	return $this->belongsToMany('App\Language')->withTimestamps();
    }

    /*
        Relationship with Authors
    */
    public function user() {
        return $this->belongsTo('App\User', 'loaned_to_user_id');
    }
}
