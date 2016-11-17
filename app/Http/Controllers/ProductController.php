<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {

	public function getList()
	{
		return view('admin.product.list');
	}

	public function getAdd()
	{
		return view('admin.product.add');
	}

	public function postAdd()
	{
		
	}
}
