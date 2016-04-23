<?php namespace freshwax\Http\Requests;

use freshwax\Http\Requests\Request;

use Auth; 

class OrderCreateFormRequest extends Request {

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
			'shopping_cart_id' => 'required'
		];
	}

}
