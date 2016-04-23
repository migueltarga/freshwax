<?php namespace freshwax\Models; 

use Illuminate\Database\Eloquent\Model;

class City extends Model {

	protected $table = "cities_extended";

	// Don't forget to fill this array
	protected $fillable = ['city', 'state_code', 'zip', 'latitude', 'longitude', 'county'];

}
