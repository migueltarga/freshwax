<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Lyric extends Model {

	protected $table = "lyrics";

	protected $fillable = ['lyrics', 'track_id', 'credit'];

	public function track(){ 
		return $this->belongsTo('freshwax\Models\Track'); 
	}
}
