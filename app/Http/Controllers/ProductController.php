<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use App\Cate;
use Auth;
use Input;
use File;
use Request;

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
		$product->user_id = Auth::user()->id;

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

	public function getDelete($id)
	{
		$product_detail = Product::find($id)->pimages->toArray();
		foreach ($product_detail as $value) {
			File::delete('resources/upload/detail/'.$value['image']);
		}

		$product = Product::find($id);
		File::delete('resources/upload/'.$product->image);
		$product->delete($id);

		return redirect()->route('admin.product.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Delete Product']);
	}

	public function getEdit($id)
	{
		$cate = Cate::all()->toArray();
		$product = Product::findOrFail($id);
		$product_image = Product::find($id)->pimages->toArray();
		return view('admin.product.edit', compact('cate', 'product', 'product_image'));
	}

	public function postEdit(ProductRequest $request, $id)
	{
		$product = Product::find($id);
		$product->name = $request->txtName;
		$product->alias = changeTitle($request->txtName);
		$product->price = $request->txtPrice;
		$product->intro = $request->txtIntro;
		$product->content = $request->txtContent;
		$product->keywords = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->cate_id = $request->sltCate;
		$product->user_id = Auth::user()->id;

		$img_current_path = 'resources/upload/'.$request->img_current; 
		if (!empty($request->hasFile('fImages')))
		{
			$file_name = $request->file('fImages')->getClientOriginalName();
			$product->image = $file_name;
			$request->file('fImages')->move('resources/upload/', $file_name);
			if (File::exists($img_current_path))
			{
				File::delete($img_current_path);
			}
		}
		else
		{
			echo "File is not exists";
		}
		$product->save();

		if (!empty($request->hasFile('fProductDetail')))
		{
			foreach ($request->file('fProductDetail') as $file) {
				$product_img = new ProductImage;
				if (isset($file))
				{
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $id;
					$file->move('resources/upload/detail/', $product_img->image);
					$product_img->save();
				}
			}
		}

		return redirect()->route('admin.product.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Edit Product']);
	}

	public function getDelImage($id)
	{
		if (Request::ajax())
		{
			$image_id = (int) Request::get('image_id');
			$image_path = Request::get('image_path');
			$image = ProductImage::find($image_id);
			if (!empty($image))
			{
				if (File::exists($image_path))
				{
					File::delete($image_path);
				}
				$image->delete();
			}
			return json_encode(['response' => TRUE]);
		}
		return json_encode(['response' => FALSE]);
	}
}
