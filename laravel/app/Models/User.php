<?php namespace freshwax\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract {

    use Authenticatable, Authorizable, CanResetPassword;
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
	protected $hidden = ['password', 'remember_token', 'admin', 'artist'];

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

    public function artists(){
		return $this->hasMany('freshwax\Models\Artist');
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
