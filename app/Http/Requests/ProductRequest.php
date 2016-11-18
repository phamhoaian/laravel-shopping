<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'sltCate' => 'required',
			'txtName' => 'required|unique:products,name',
			'fImages' => 'required|image'
		];
	}

	public function messages()
	{
		return [
			'sltCate.required' => 'Please Choose Category',
			'txtName.required' => 'Please Enter Product Name',
			'txtName.unique' => 'Product Name Is Exist',
			'fImages.required' => 'Please Upload Images',
			'fImages.image'	=> 'This File Is Not Image'
		];
	}

}
