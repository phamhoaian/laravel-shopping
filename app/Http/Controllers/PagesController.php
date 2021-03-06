<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Cate;
use Cart;
use Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feature_product = Product::orderBy('id', 'DESC')->skip(0)->take(8)->get();
		return view('pages.home', compact('feature_product'));
	}

	public function category($id, $alias)
	{
		$product = Product::where('cate_id', $id)->paginate(2);

		$cate = Cate::where('id', $id)->first();
		if ($cate->parent_id != 0) {
			$menu_cate = Cate::where('parent_id', $cate->parent_id)->get();
			
		} else {
			$menu_cate = Cate::where('parent_id', $id)->get();
		}

		$best_seller = Product::orderByRaw('RAND()')->take(3)->get();
		$latest_product = Product::orderBy('id', 'DESC')->take(3)->get();
		
		return view('pages.category', compact('product', 'menu_cate', 'best_seller', 'latest_product'));
	}

	public function product($id)
	{
		$product = Product::where('id', $id)->first();
		$product_image = ProductImage::where('product_id', $id)->get();
		$related_product = Product::where('id', '<>', $id)->where('cate_id', $product->cate_id)->orderByRaw('RAND()')->take(4)->get();
		return view('pages.product', compact('product', 'product_image', 'related_product'));
	}

	public function addToCart($id)
	{
		$product_buy = Product::where('id', $id)->first();
		$cart = array(
			'id'		=> $id,
			'name'		=> $product_buy->name,
			'qty'		=> 1,
			'price'		=> $product_buy->price,
			'options' 	=> array('img' => $product_buy->image)
		);
		Cart::add($cart);

		return redirect()->route('cart');
	}

	public function cart()
	{
		$content = Cart::content();
		$total = Cart::total();
		return view('pages.cart', compact('content', 'total'));
	}

	public function cartDelete($id)
	{
		Cart::remove($id);
		return redirect()->route('cart');
	}

	public function cartUpdate($rowid, $qty)
	{
		if (Request::ajax()) 
		{
			$rowid = Request::get('rowid');
			$qty = Request::get('qty');
			Cart::update($rowid, $qty);
			return json_encode(['response' => true]);
		}
		else
		{
			return json_encode(['response' => false]);
		}
	}
}
