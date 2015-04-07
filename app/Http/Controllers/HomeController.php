<?php namespace Subalcatel\Http\Controllers;

use Subalcatel\Http\Requests;
use Subalcatel\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}

}
