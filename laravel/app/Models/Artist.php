<?php namespace freshwax\Models;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

	protected $table = "artists";

	protected $fillable = ['bio', 'hometown', 'name'];

    public function posts(){
		return $this->hasMany('freshwax\Models\Post');
	}

    public function recommendations(){
		return $this->hasMany('freshwax\Models\Recommendation');
	}

	public function albums(){
		return $this->belongsToMany('freshwax\Models\Album');
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

	public function user(){
		return $this->belongsTo('freshwax\Models\User');
    }

	public function hasBackground(){
		foreach($this->photos as $p){
			if($p->background){
				return true;
			}
		}
		return false;
	}

	public function hasBanner(){
		foreach($this->photos as $p){
			if($p->banner){
				return true;
			}
		}
		return false;
	}

	public function background(){
		foreach($this->photos as $p){
			if($p->background){
				return $p;
			}
		}
		return null;
	}

	public function banner(){
		foreach($this->photos as $p){
			if($p->banner){
				return $p;
			}
		}
		return null;
	}
}
