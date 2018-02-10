<?php namespace freshwax\Http\Requests;

use freshwax\Http\Requests\Request;

use Auth;

class TrackCreateFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if(Auth::check() && Auth::user()->isadmin){
			return true;
		} else if (Auth::user()->artists_count > 0){
			return true;
		} else {
			return true;
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required'
		];
	}

}
