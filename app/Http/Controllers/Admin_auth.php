<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class Admin_auth extends Controller
{
	function login_submit(Request $r)
	{
		$email = $r->input('email');
		$password = $r->input('password');

		$result = DB::table('users')
			->where('email', $email)
			->where('password', $password)
			->get();

		if (isset($result[0]->id)) {
			if ($result[0]->status === 1) {
				$r->session()->put('BLOG_USER_ID', $result[0]->id);
				$r->session()->put('BLOG_USER_NAME', $result[0]->name);
				return redirect('admin/post/list');
			} else {

				$r->session()->flash('msg', 'Account is deactivated');
				return redirect('admin/login');
			}
		} else {
			$r->session()->flash('msg', 'Please enter valid login');
			return redirect('admin/login');
		}
	}
	function logout(Request $r){
		$r->session()->forget('BLOG_USER_ID');
		$r->session()->flash('msg','Logged out successfully');
		return redirect('admin/login');
	}
}
