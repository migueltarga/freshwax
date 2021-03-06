<?php namespace freshwax\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable {

	use HasApiTokens, Notifiable;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'isadmin', 'isartist'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'api_token', 'remember_token', 'admin', 'artist'];

	public static function boot()
	{
		parent::boot();

		User::creating(function($buyer)
		{
			if(Hash::needsRehash($buyer->password)){
				$buyer->password = Hash::make($buyer->password);
			}
		});
	}

	public function roles(){
		return $this->belongsToMany('freshwax\Models\Role');
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

	public function labels(){
		return $this->hasMany('freshwax\Models\Label');
	}

    public function recommendations(){
		return $this->hasMany('freshwax\Models\Recommendation');
	}

    public function posts(){
		return $this->hasMany('freshwax\Models\Post');
	}

	public function addresses(){
		return $this->hasMany('freshwax\Models\Address');
	}

	public function orders(){
		return $this->hasMany('freshwax\Models\Order');
	}

	public function cart(){
		return $this->hasOne('freshwax\Models\ShoppingCart');
	}

	public function wishlist(){
		return $this->hasOne('freshwax\Models\Wishlist');
	}


}
