<?php namespace papeleria\Http\Controllers;

use papeleria\Http\Requests;
use Illuminate\Http\Request;
use papeleria\Http\Controllers\Controller;
use papeleria\Products;
use papeleria\Pedidos;
use papeleria\User;
use papeleria\Company;
use papeleria\Departments;
use Illuminate\Contracts\Auth\Guard;
use Input;
use Auth;
use Illuminate\Support\Facades\DB;

class NormalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){

		$this->middleware('auth');
		/*guest sirve para cuando NO este logueado todos puedan ver las view
		y auth sirve para cuando este logueado solo los usuarios registrados puedan ver las views*/
	}


	public function index_info(){

		$user = Auth::User();     
        $id = $user->id;

		$user = \DB::table('users')
		/**/
		->where('users.id', $id)
		->select('company.*', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->join('company', 'company.id', '=', 'users.company_id')

		->get();

		return view('myinfo')->with('user', $user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$user = Auth::User();     
        $id = $user->id;

		$products = new Pedidos;

		$products->user_id = $id;
		$products->status = '0';
		$products->total_products = Input::get('total_products');
		$pedido = Input::get('articulos');
		$products->articulos = json_encode($pedido);
		
		return Redirect('/desktop')->with($products->save())->with('alert', 'Pedido Creado');
	}

	public function pedidos_normal(){

		$empresa = Pedidos::all();
		return view('pedidos_n')->with('empresa', $empresa);	
	}

	public function catalogo_normal(){

		$products = products::orderBy('id', 'asc')->paginate(25);
		return view('catalogo_n')->with('products', $products);	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$products = products::find($id);
		return view('update')->with('products', $products);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$details = user::find($id);
		$details->name = Input::get('name');
		$details->password = bcrypt(Input::get('password'));

		$details->save();

		return Redirect('/desktop/informacion')->with('alert', 'Datos Modificados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
