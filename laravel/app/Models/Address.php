<?php namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model { 

    public static $rules = [
         'street' => 'required', 
         'zip' => 'required'
    ];

    protected $table = 'addresses';

    protected $fillable = ['street', 'additional', 'city', 'country', 'state', 'zip', 'shipping', 'billing', 'user_id', 'order_id'];


    public function user()
    {
        return $this->belongsTo('freshwax\Models\User');
    }

    public function order()
    {
        return $this->belongsToMany('freshwax\Models\Order');
    }    

    public function shipping() 
    { 
    	return $this->shipping; 
    }

    public function billing()
    { 
    	return $this->billing; 
    }

    public function shipAndBill()
    { 
    	return $this->shipping() && $this->billing(); 
    }

    public function format(){ 

        if (isset($this->additional)){
            return $this->street . ', ' . $this->city . ', ' . $this->state . ', ' . $this->zip;
        } else { 
            return $this->street . ', ' . $this->additional . ', ' . $this->city . ', ' . $this->state . ', ' . $this->zip;
        }

    }

}
