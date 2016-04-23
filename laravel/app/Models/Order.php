<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = "orders";

	protected $fillable = ['user_id', 'total'];

	public function addresses(){ 
		return $this->belongsToMany('freshwax\Models\Address')->withPivot('shipping', 'billing'); 
	}

	public function user(){ 
		return $this->belongsTo('freshwax\Models\User'); 
	}

}
