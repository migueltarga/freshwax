<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $table = "events";

	protected $fillable = ['name', 'description', 'time', 'private'];

	public function posts(){ 
		return $this->hasMany('freshwax\Models\Album'); 
	}

	public function artist(){ 
		return $this->hasMany('freshwax\Models\Artist'); 
	}

	public function photos(){ 
		return $this->hasMany('freshwax\Models\Photo'); 
	}

	public function tags(){ 
		return $this->belongsToMany('freshwax\Models\Tag'); 
	}
}
