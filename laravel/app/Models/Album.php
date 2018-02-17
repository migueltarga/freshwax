<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	protected $table = "albums";

	protected $fillable = ['name', 'release_date', 'description', 'personnel', 'private'];

	public function artists(){
		return $this->belongsToMany('freshwax\Models\Artist');
	}

	public function user(){
		return $this->belongsTo('freshwax\Models\User');
    }

	public function tracks(){
		return $this->hasMany('freshwax\Models\Track');
	}

	public function posts(){
		return $this->hasMany('freshwax\Models\Post');
	}

	public function photos(){
		return $this->hasMany('freshwax\Models\Photo');
	}

	public function tags(){
		return $this->belongsToMany('freshwax\Models\Tag');
	}


}
