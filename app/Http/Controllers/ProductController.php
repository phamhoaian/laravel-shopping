<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Cate;

class ProductController extends Controller {

	public function getList()
	{
		return view('admin.product.list');
	}

	public function getAdd()
	{
		$cate = Cate::all()->toArray();
		return view('admin.product.add', compact('cate'));
	}

	public function postAdd(ProductRequest $request)
	{
		$product = new Product;
		$product->name = $request->txtName;
		$product->alias = changeTitle($request->txtName);
		$product->price = $request->txtPrice;
		$product->intro = $request->txtIntro;
		$product->content = $request->txtContent;
		$product->keywords = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->cate_id = $request->sltCate;
		$product->user_id = 1;

		$file_name = $request->file('fImages')->getClientOriginalName();
		$product->image = $file_name;
		$request->file('fImages')->move('resources/upload/', $file_name);

		$product->save();

		return redirect()->route('admin.product.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Add Product']);
	}
}
