<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = "tags"; 

	protected $fillable = ['tag'];

	public function albums(){ 
		return $this->belongsToMany('freshwax\Models\Album'); 
	}

	public function events(){ 
		return $this->belongsToMany('freshwax\Models\Event'); 
	}

	public function posts(){ 
		return $this->belongsToMany('freshwax\Models\Post'); 
	}

	public function tracks(){ 
		return $this->belongsToMany('freshwax\Models\Track'); 
	}

	public function items(){ 
		return $this->belongsToMany('freshwax\Models\Item'); 
	}

}
