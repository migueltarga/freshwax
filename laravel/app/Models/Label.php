<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

	protected $table = "labels";

	protected $fillable = ['about', 'city', 'name'];

	public function posts(){
		return $this->hasMany('freshwax\Models\Post');
	}

	public function artists(){
		return $this->hasMany('freshwax\Models\Artist');
	}

	public function albums(){
		return $this->hasMany('freshwax\Models\Album');
	}

	public function tracks(){
		return $this->hasMany('freshwax\Models\Track');
	}

	public function events(){
		return $this->belongsToMany('freshwax\Models\Event');
	}

	public function photos(){
		return $this->hasMany('freshwax\Models\Photo');
	}

	public function users(){
		return $this->belongsToMany('freshwax\Models\User');
	}

	public function hasUser($user){
		$id = $user->id;
		foreach($this->users as $u){
			if($u->id == $id){
				return true;
			}
		}
		return false;
	}
}
