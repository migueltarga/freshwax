<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	protected $table = "photos"; 

	protected $fillable = ['name', 'caption', 'path', 'banner', 'background', 'artist_id', 'album_id', 'track_id', 'event_id', 'post_id', 'item_id'];

	public function artist(){ 
		return $this->belongsTo('freshwax\Models\Artist'); 
	}

	public function album(){ 
		return $this->belongsTo('freshwax\Models\Album'); 
	}

	public function track(){ 
		return $this->belongsTo('freshwax\Models\Track'); 
	}

	public function event(){ 
		return $this->belongsTo('freshwax\Models\Event'); 
	}

	public function post(){ 
		return $this->belongsTo('freshwax\Models\Post'); 
	}

	public function item(){ 
		return $this->belongsTo('freshwax\Models\Item'); 
	}

}
