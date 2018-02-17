<?php

namespace freshwax;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = ['name'];

	public function users(){
		return $this->belongsToMany('freshwax\Models\User');
	}

}
