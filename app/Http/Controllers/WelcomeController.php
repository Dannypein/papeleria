<?php namespace papeleria\Http\Controllers;

use papeleria\Products;
use Illuminate\Http\Request;
use papeleria\Http\Controllers\Controller;
use Fileentry;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*public function __construct()
	{
		$this->middleware('guest');
		guest sirve para cuando NO este logueado todos puedan ver las view
		y auth sirve para cuando este logueado solo los usuarios registrados puedan ver las views
	}*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(){

		$products = Products::all();
		return view('welcome')->with('products', $products);
	}

	/*----controladores de las vistas principales----*/

	public function acercade(){
		
		return view('acercade');
	}

	public function contacto(){
		
		return view('contacto');
	}

	/*----controladores de articulos----*/
	
	public function articulo($id){
		
		$details = Products::find($id);
		return view('articulo')->with('details', $details);
	}

	/*----controladores de las vistas del menu izquierdo----*/

	public function escolar(){
		
		return view('escolar');
	}

	public function oficina(){
		
		return view('oficina');
	}

	public function computo(){
		
		return view('computo');
	}

	public function regalos(){
		
		return view('regalos');
	}

}
