<?php namespace freshwax\Http\Requests;

use freshwax\Http\Requests\Request;

use Auth;

class UserStoreRoleFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id' => 'required',
			'role_id' => 'required',
		];
	}

}
