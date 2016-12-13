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
					'cate_id' => 'required',
					'name' => 'required|unique:products,name',
					'image' => 'required|image'
				];
	        }
	        case 'PUT':
	        case 'PATCH':
	        {
	            return [
					'cate_id' => 'required',
					'name' => 'required|unique:products,name,'.$this->id,
					'image' => 'image'
				];
	        }
	        default:break;
	    }
	}

	public function messages()
	{
		return [
			'cate_id.required' => 'Please Choose Category',
			'name.required' => 'Please Enter Product Name',
			'name.unique' => 'Product Name Is Exist',
			'image.required' => 'Please Upload Images',
			'image.image'	=> 'This File Is Not Image'
		];
	}

}
