<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $table = "items"; 

	protected $fillable = ['name', 'description', 'total'];

	public function photos(){ 
		return $this->hasMany('freshwax\Models\Photo'); 
	}

	public function carts(){ 
		return $this->belongsToMany('freshwax\Models\ShoppingCart'); 
	}

	public function wishlist(){ 
		return $this->belongsToMany('freshwax\Models\Wishlist'); 
	}

	public function tags(){ 
		return $this->belongsToMany('freshwax\Models\Tag'); 
	}

}
