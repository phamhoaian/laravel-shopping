<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feature_product = Product::orderBy('id', 'DESC')->skip(0)->take(5)->get();
		return view('pages.home', compact('feature_product'));
	}

	public function category($id, $alias)
	{
		# code...
	}

}
