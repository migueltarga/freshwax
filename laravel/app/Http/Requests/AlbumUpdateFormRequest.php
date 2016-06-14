<?php namespace freshwax\Http\Requests;

use freshwax\Http\Requests\Request;

use Auth;

class AlbumCreateFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if(Auth::check()){
			return Auth::user()->isartist || Auth::user()->isadmin;
		} else {
			return false;
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
		];
	}

}
