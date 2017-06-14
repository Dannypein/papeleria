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
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

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

	public function desktop(Guard $auth){

		if ($auth->user()->normal()) {

			$pedidos = pedidos::all();
			return view('desktop')->with('pedidos', $pedidos);

		} else {

			return redirect('/admin');
		}

	}

	public function admin(){

		$user = user::all();
		return view('admin')->with('user', $user);
	}

/*--------------------Controllers de Views del menu izquierdo admin-----------------------*/

	public function usuarios(){

		$user = \DB::table('users')
		/**/
		->select('company.*', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->join('company', 'company.id', '=', 'users.company_id')

		->get();

		return view('usuarios')->with('user', $user);
	}

	public function creditos(){

		$credit = \DB::table('users')
		/**/
		->select('users.id as userID', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')

		->get();

		return view('creditos')->with('credit', $credit);

	}

	public function empresa(){
		
		$empresa = company::all();
		return view('empresa')->with('empresa', $empresa);
	}

	public function catalogo(){
		
		$products = products::all();
		return view('catalogo')->with('products', $products);
	}

	public function pedidos(){

		$pedidos = \DB::table('pedidos')
		/**/
		->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->orderby('PedidoID','ASC')
		->get();
		
		return view('pedidos')->with('pedidos', $pedidos);
	}

/*------------------------Controllers de Edicion------------------------------------*/

	public function editar_credito($id){
		
		$credit = \DB::table('users')
		/**/
		->where('users.id', $id)
		->select('users.id as userID', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->get();

		return view('editar_credito')->with('credit', $credit);
	}

		public function update_empresa($id){

		$company = Company::find($id);

		$company->name_company = Input::get('name_company');
		$company->address_company = Input::get('address_company');
		$company->phone = Input::get('phone');

		$company->save();

		return Redirect('/admin/empresas')->with('alert', 'Empresa Modificada');
	}

	public function nuevo_credito($id){

		$credit = user::find($id);

		$credit->credit_limit = Input::get('credit_limit');

		$credit->save();

		return Redirect('/admin/creditos')->with('alert', 'Credito Modificado');
	}

	public function refresh($id){

		$details = user::find($id);

		$details->name = Input::get('name');
		$details->email = Input::get('email');
		$details->password = bcrypt(Input::get('password'));

		$details->save();

		return Redirect('/admin/usuarios')->with('alert', 'Usuario Modificado');
	}

	public function edit($id){

		$details = user::find($id);
		return view('edit')->with('details', $details);
	}

	public function edit_empresa($id){

		$company = company::find($id);
		return view('edit_empresa')->with('company', $company);
	}

	public function editar_pedido($id){
		
		$pedido = \DB::table('pedidos')
		/**/
		->where('pedidos.id', $id)
		->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->get();

		$pedido2 = \DB::table('pedidos')
		->where('products.id', $id)
		->select('products.id as PID', 'pedidos.*', 'products.*')
		->join('products', 'products.id', '=', 'pedidos.id')
		->get();

		return view('edit_pedido')->with('pedido', $pedido)->with('pedido2', $pedido2);
	}

/*--------------------Controllers de Creacion--------------------*/

	public function create(){	

		$user = new User;

		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = bcrypt(Input::get('password'));
		$user->department_id = Input::get('department_id');
		$user->company_id = Input::get('department_id');
		$user->company_id = Input::get('company_id');
		$user->type = 'normal';
		
		return Redirect('/admin/usuarios')->with($user->save())->with('alert', 'Usuario Creado');
	}

	public function create_empresa(){

		$empresa = new Company;

		$empresa->name_company = Input::get('name');
		$empresa->address_company = Input::get('address');
		$empresa->phone = Input::get('phone');
		
		return Redirect('/admin/empresas')->with($empresa->save())->with('alert', 'Empresa Creada');
	}

	public function nueva_empresa(){
		
		$nempresa = company::all();
		return view('nueva_empresa')->with('nempresa', $nempresa);
	}

	public function nuevo(){

		$user = \DB::table('departments')
		->select('departments.*')
		->get();

		$user2 = \DB::table('company')
		->select('company.*')
		->get();

		return view('nuevo')->with('user', $user)->with('user2', $user2);

	}

/*---------------------------------------*/
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/*------------Controllers de productos------------------*/

	public function update($id){

		$products = products::find($id);
		return view('update')->with('products', $products);
	}

	public function carrito(){

		$cart = session('cart', []);

		$products = pedidos::all();
		return view('carrito')->with('products', $products)->with('cart', $cart);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

		/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/*-------------Controller de eliminacion-----------------*/
		
	public function destroy($id)
	{
		$delete = user::find($id);
  		return Redirect('/admin/usuarios')->with($delete->delete())->with('alert', 'Usuario borrado');
	}

}
