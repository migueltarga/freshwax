<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {

	protected $table = "tracks";

	protected $fillable = ['name', 'album_id', 'length', 'file_name', 'path', 'ext', 'original_ext', 'private', 'uploaded', 'comment', 'embed'];

	public function user(){
		return $this->belongsTo('freshwax\Models\User');
	}

	public function artists(){
		return $this->belongsToMany('freshwax\Models\Artist');
	}

	public function album(){
		return $this->belongsTo('freshwax\Models\Album');
	}

	public function posts(){
		return $this->hasMany('freshwax\Models\Post');
	}

	public function photos(){
		return $this->hasMany('freshwax\Models\Photo');
	}

	public function lyric(){
		return $this->hasOne('freshwax\Models\Lyric');
	}

	public function tags(){
		return $this->belongsToMany('freshwax\Models\Tag');
	}

}
