<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = "posts"; 

	protected $fillable = ['name', 'body', 'artist_id', 'album_id', 'track_id', 'event_id', 'private', 'user_id'];

	public function photos(){ 
		return $this->hasMany('freshwax\Models\Photo'); 
	}

	public function user(){ 
		return $this->belongsTo('freshwax\Models\User'); 
	}

	public function tags(){ 
		return $this->belongsToMany('freshwax\Models\Tag'); 
	}

}
