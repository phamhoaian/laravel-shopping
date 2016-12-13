<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\Eloquents\ProductRepository;
use App\Repositories\Eloquents\ProductImageRepository;
use App\Repositories\Eloquents\CateRepository;
use App\Product;
use App\ProductImage;
use App\Cate;
use Auth;
use Input;
use File;
use Request;

class ProductController extends Controller {

	protected $productRepository;

	protected $cateRepository;

	protected $productImageRepository;

	public function __construct(ProductRepository $productRepository, ProductImageRepository $productImageRepository, CateRepository $cateRepository)
	{
		$this->productRepository = $productRepository;
		$this->productImageRepository = $productImageRepository;
		$this->cateRepository = $cateRepository;
	}

	public function getList()
	{
		$product = $this->productRepository->all();
		return view('admin.product.list', compact('product'));
	}

	public function getAdd()
	{
		$cate = $this->cateRepository->all();
		return view('admin.product.add', compact('cate'));
	}

	public function postAdd(ProductRequest $request)
	{
		$input = $request->except(['_token', 'image', 'fProductDetail']);
		$input['alias'] = changeTitle($request->name);
		$input['user_id'] = Auth::user()->id;

		$file_name = $request->file('image')->getClientOriginalName();
		$input['image'] = $file_name;
		$request->file('image')->move('resources/upload/', $file_name);

		$product = $this->productRepository->create($input);

		// get product id
		$product_id = $product->id;

		// upload multi file 
		if (Input::hasFile('fProductDetail'))
		{
			foreach (Input::file('fProductDetail') as $file)
			{
				if (isset($file))
				{
					$product_img['image'] = $file->getClientOriginalName();
					$product_img['product_id'] = $product_id;
					$file->move('resources/upload/detail/', $file->getClientOriginalName());
					$this->productImageRepository->create($product_img);
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
		$cate = $this->cateRepository->all();
		$product = $this->productRepository->find($id);
		$product_image = $this->productRepository->find($id)->pimages->toArray();
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
