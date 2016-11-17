<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller {

	public function getList()
	{
		$data = Cate::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.cate.list', compact('data'));
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
		$cate->parent_id 	= $request->sltCateParent;
		$cate->keywords 	= $request->txtKeywords;
		$cate->description 	= $request->txtDescription;
		$cate->save();

		return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Add Category']);
	}

	public function getDelete($id)
	{
		$parent = Cate::where('parent_id', $id)->count();
		if ($parent == 0)
		{
			$cate = Cate::find($id);
			$cate->delete();

			return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Delete Category']);
		}
		else
		{
			return redirect()->route('admin.cate.list')->with(['flash_level' => 'danger', 'flash_message' => 'Error ! This Category Has Child Category']);
		}
	}

	public function getEdit($id)
	{
		$data = Cate::findOrFail($id)->toArray();
		$parent = Cate::select('id', 'name', 'parent_id')->where('id', '<>', $id)->get()->toArray();
		return view('admin.cate.edit', compact('parent', 'data'));
	}

	public function postEdit(Request $request, $id)
	{
		$this->validate($request,
			[
				'txtCateName' => 'required'
			],
			[
				'txtCateName.required' => 'Please Enter Category Name'
			]
		);

		$cate = Cate::find($id);
		$cate->name 		= $request->txtCateName;
		$cate->alias 		= changeTitle($request->txtCateName);
		$cate->order 		= $request->txtOrder;
		$cate->parent_id 	= $request->sltCateParent;
		$cate->keywords 	= $request->txtKeywords;
		$cate->description 	= $request->txtDescription;
		$cate->save();

		return redirect()->route('admin.cate.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Complete Edit Category']);
	}
}
