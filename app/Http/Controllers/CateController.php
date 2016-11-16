<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller {

	public function getList()
	{
		return view('admin.cate.list');
	}

	public function getAdd()
	{
		$parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
		return view('admin.cate.add', compact('parent'));
	}

	public function postAdd(CateRequest $request)
	{
		$cate = new Cate;
		$cate->name 		= $request->txtCateName;
		$cate->alias 		= changeTitle($request->txtCateName);
		$cate->order 		= $request->txtOrder;
		$cate->parent_id 	= 1;
		$cate->keywords 	= $request->txtKeywords;
		$cate->description 	= $request->txtDescription;
		$cate->save();

		return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Add Category']);
	}
}
