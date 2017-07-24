<?php

namespace freshwax\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
	protected $table = "recommendations";

	protected $fillable = ["user_id"];

    public function user(){
		return $this->belongsTo('freshwax\Models\User');
    }

    public function artist(){
		return $this->hasOne('freshwax\Models\Artist');
	}
}
