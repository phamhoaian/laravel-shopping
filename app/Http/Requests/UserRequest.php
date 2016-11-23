<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
		switch($this->method())
	    {
	        case 'GET':
	        case 'DELETE':
	        {
	            return [];
	        }
	        case 'POST':
	        {
	            return [
					'txtUser'	=> 'required:unique:users,name',
					'txtPass'	=> 'required',
					'txtRePass'	=> 'required|same:txtPass',
					'txtEmail'	=> 'required'
				];
	        }
	        case 'PUT':
	        case 'PATCH':
	        {
	            return [
					'txtRePass'	=> 'same:txtPass',
					'txtEmail'	=> 'required|email'
				];
	        }
	        default:break;
	    }
	}

	public function messages()
	{
		return [
			'txtUser.required' => 'Please Enter Username',
			'txtUser.unique' => 'The User Is Exists',
			'txtPass.required' => 'Please Enter Password',
			'txtRePass.required' => 'Please Enter Re-Password',
			'txtRePass.same' => 'Two Password Don\'t Match',
			'txtEmail.required' => 'Please Enter Email',
			'txtEmail.email' => 'Please Enter Correct Email'
		];
	}

}
