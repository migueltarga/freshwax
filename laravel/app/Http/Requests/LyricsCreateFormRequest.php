<?php namespace freshwax\Http\Requests;

use freshwax\Http\Requests\Request;

use Auth;

class LyricsCreateFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check() && Auth::user()->isadmin;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'track_id' => 'required', 
			'lyrics' => 'required'
		];
	}

}
