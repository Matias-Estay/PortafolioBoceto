<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsuarioController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function obtener_usuario()
	{
		$user = Auth::user();
		
		$datos = DB::select("SELECT u.id, u.email
			FROM users as u
			where u.email = '" . $user->email . "';");

		return response($datos);
	}
	public function post_test(Request $data)
	{
		return $data;
	}
	public function get_test(Request $data)
	{
		return $data;
	}
}
