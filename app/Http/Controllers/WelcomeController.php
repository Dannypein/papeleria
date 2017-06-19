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

		$products = Products::orderBy('id', 'asc')->paginate(12);
		return view('welcome')->with('products', $products);
	}

	/*----controladores de las vistas principales----*/

	public function acercade(){
		
		return view('acercade');
	}

	public function contacto(){
		
		return view('contacto');
	}

	/*----Controlador de busqueda----*/

	public function search(Request $request){
		
		$products = Products::name($request->get('name'))->orderBy('id', 'asc')->paginate(12);
		return view('welcome')->with('products', $products);
	}

	/*----controladores de articulos----*/
	
	public function articulo($id){
		
		$details = Products::find($id);
		return view('articulo')->with('details', $details);
	}

	/*----controladores de las vistas del menu izquierdo----*/

	public function escolar(){
		
		$products = \DB::table('products')
		/**/
		->where('products.category', '=', 3)
		->paginate(12);

		$titulo  = 'Consumibles originales';
		return view('escolar', ['titulo' => $titulo])->with('products', $products);
	}

	public function oficina(){

		$products = \DB::table('products')
		/**/
		->where('products.category', '=', 1)
		->paginate(12);

		$titulo  = 'Papeleria y Oficina';
		return view('oficina', ['titulo' => $titulo])->with('products', $products);
	}

	public function computo(){
		
		$products = \DB::table('products')
		/**/
		->where('products.category', '=', 2)
		->paginate(12);
		
		$titulo  = 'Computo';
		return view('computo', ['titulo' => $titulo])->with('products', $products);
	}

	public function regalos(){
		
		$products = \DB::table('products')
		/**/
		->where('products.category', '=', 4)
		->paginate(12);

		$titulo  = 'Consumibles genericos';
		return view('regalos', ['titulo' => $titulo])->with('products', $products);
	}

}
