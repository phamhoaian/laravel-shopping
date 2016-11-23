<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller {

	public function getList()
	{
		$users = User::orderBy('id', 'DESC')->get()->toArray();
		return view('admin.user.list', compact('users'));
	}

	public function getAdd()
	{
		return view('admin.user.add');
	}

	public function postAdd(UserRequest $request)
	{
		$user = new User;
		$user->username = $request->txtUser;
		$user->password = Hash::make($request->txtPass);
		$user->email = $request->txtEmail;
		$user->level = $request->rdoLevel;
		$user->remember_token = $request->_token;
		$user->save();

		return redirect()->route('admin.user.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Completed Add User']);
	}

	public function getDelete($id)
	{
		$user_current_login = Auth::user()->id;
		$user = User::find($id);
		if ($id == 1 || ($user_current_login != 1 && $user["level"] == 1))
		{
			return redirect()->route('admin.user.list')->with(['flash_level' => 'danger', 'flash_message' => 'Error ! You Cannot Delete Superadmin']);
		}
		else 
		{
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Completed Delete User']);
		}																																																																				
	}

	public function getEdit($id)
	{
		$user = User::find($id);
		return view('admin.user.edit', compact('user'));
	}

	public function postEdit(UserRequest $request, $id)
	{
		$user = User::find($id);
		if ($request->txtPass)
		{
			$user->password = Hash::make($request->txtPass);
		}
		$user->email = $request->txtEmail;
		$user->level = $request->rdoLevel;
		$user->remember_token = $request->_token;
		$user->save();

		return redirect()->route('admin.user.list')->with(['flash_level' => 'success', 'flash_message' => 'Success ! Completed Edit User']);
	}

}
