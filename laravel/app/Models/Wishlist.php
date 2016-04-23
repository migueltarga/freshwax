<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {

	protected $table = "wishlists"; 

	protected $fillable = ['user_id'];

	public function user(){ 
		return $this->belongsTo('freshwax\Models\User'); 
	}

	public function items(){ 
		return $this->belongsToMany('freshwax\Models\Item'); 
	}

	public function hasItem($id){ 
		foreach($this->items as $i){
			if($i->id == $id){
				return true;
			}
		}

		return false; 
	}

	public function removeItem($id){ 
		$this->items()->detach($id); 
		return true; 
	}
}
