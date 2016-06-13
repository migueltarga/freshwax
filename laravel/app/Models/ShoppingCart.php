<?php

namespace freshwax;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model {

	protected $fillable = ['user_id', 'order_id', 'total'];

	public function user(){
		return $this->belongsTo('freshwax\Models\User');
	}

	public function order(){
		return $this->belongsTo('freshwax\Models\Order');
	}

	public function items(){
		return $this->belongsToMany('freshwax\Models\Item');
	}

	public function total(){

		$total = 0;
		foreach($this->items as $i){
			$total = $total + $i->total;
		}

		return number_format($total, 2);
	}

}
