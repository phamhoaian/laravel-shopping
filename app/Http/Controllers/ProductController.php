<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use App\Cate;
use Input;

class ProductController extends Controller {

	public function getList()
	{
		$product = Product::orderBy('id', 'DESC')->get()->toArray();
		return view('admin.product.list', compact('product'));
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

		// get product id
		$product_id = $product->id;

		// upload multi file 
		if (Input::hasFile('fProductDetail'))
		{
			foreach (Input::file('fProductDetail') as $file)
			{
				$product_img = new ProductImage;
				if (isset($file))
				{
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id;
					$file->move('resources/upload/detail/', $file->getClientOriginalName());
					$product_img->save();
				}
			}
		}

		return redirect()->route('admin.product.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Add Product']);
	}
}
