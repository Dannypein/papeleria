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
use papeleria\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

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

			$user = Auth::user();     
        	$id = $user->id;


			$pedidos = \DB::table('pedidos')
			/**/
			->where('users.id', $id)
			->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*')
			->join('users', 'users.id', '=', 'pedidos.user_id')
			->orderby('PedidoID','DESC')
			->paginate(15);

			return view('desktop')->with('pedidos', $pedidos);

		} else {

			return redirect('/admin');

		}

	}

	public function admin(){

		$pedidos = \DB::table('pedidos')
		/**/
		->where('pedidos.status', '=', '0')
		->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->orderby('PedidoID','desc')
		->paginate(10);

		$user = user::orderBy('id', 'desc')->paginate(10);
		return view('admin')->with('user', $user)->with('pedidos', $pedidos);
	}

/*----Buqueda----*/

	public function search3(Request $request){
			
			$products = Products::name($request->get('name'))->orderBy('id', 'asc')->paginate(12);
			return view('catalogo')->with('products', $products);
		}

/*--------------------Controllers de Views del menu izquierdo admin-----------------------*/

	public function usuarios(){

		$user = \DB::table('users')
		/**/
		->select('company.*', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->join('company', 'company.id', '=', 'users.company_id')

		->paginate(15);

		return view('usuarios')->with('user', $user);
	}

	public function creditos(){

		$credit = \DB::table('users')
		/**/
		->select('users.id as userID', 'departments.*', 'users.*')
		->join('departments', 'departments.id', '=', 'users.department_id')

		->paginate(15);

		return view('creditos')->with('credit', $credit);

	}

	public function empresa(){
		
		$empresa = company::all();

		$empresa2 = Departments::all();

		return view('empresa')->with('empresa', $empresa)->with('empresa2', $empresa2);
	}

	public function catalogo(){
		
		$products = products::orderBy('id', 'desc')->paginate(15);
		return view('catalogo')->with('products', $products);
	}

	public function pedidos(){

		$pedidos = \DB::table('pedidos')
		/**/
		->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->orderby('PedidoID','DESC')
		->paginate(15);
		
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
		->select('pedidos.id as PedidoID', 'pedidos.created_at as Pcreate', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->get();

		$pedido3 = pedidos::find($id);
		$productos = json_decode($pedido3->articulos);
		

		return view('edit_pedido')->with('pedido', $pedido)->with('productos', $productos);
	}


	public function update_status($id){

		$pedido = pedidos::find($id);
		$pedido->status = Input::get('status');
		$pedido->save();

		return Redirect('/admin/pedidos')->with('alert', 'Status del Pedido Modificado');
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

	public function nuevo_depa(){

		return view('nuevo_depa');
	}

	public function nuevo_product(){

		return view('nuevo_product');
	}

	public function create_department(){

		$empresa = new Departments;

		$empresa->department = Input::get('name');
		
		return Redirect('/admin/empresas')->with($empresa->save())->with('alert', 'Departamento Creado');
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

	public function store($id){

		$products = products::find($id);

		$products->name = Input::get('name');
		$products->model = Input::get('model');
		$products->brand = Input::get('brand');
		$products->size = Input::get('size');
		$products->unit = Input::get('unit');
		$products->price = Input::get('price');
		$products->weight = Input::get('weight');
		$products->type = Input::get('type');
		$products->available = strtolower(Input::get('available'));
		$products->category = Input::get('category');
		$products->stock = Input::get('stock');
		$products->details = Input::get('details');

		if ($imagen = Input::file('file')) {

			$imagen->move(base_path('/public/img/products/'), $products->id .'/'. $products->id. '.jpg');
		}
		
		return Redirect('/admin/catalogo')->with($products->save())->with('alert', 'Producto Modificado');
	}

	public function create_p(){

		$products = new products;

		$products->name = Input::get('name');
		$products->sku = Input::get('sku');
		$products->model = Input::get('model');
		$products->brand = Input::get('brand');
		$products->size = Input::get('size');
		$products->unit = Input::get('unit');
		$products->price = Input::get('price');
		$products->weight = Input::get('weight');
		$products->type = Input::get('type');
		$products->available = strtolower(Input::get('available'));
		$products->category = Input::get('category');
		$products->stock = Input::get('stock');
		$products->details = Input::get('details');
		$products->save();

		$imagen = Input::file('file');
		$imagen->move(base_path('/public/img/products/'), $products->id .'/'. $products->id. '.jpg');
		
		return Redirect('/admin/catalogo')->with('alert', 'Producto Modificado');
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

	public function delete($id){

		$delete = products::find($id);
  		return Redirect('/admin/catalogo')->with($delete->delete())->with('alert', 'Producto borrado');
	}
		
	public function destroy($id){

		$delete = user::find($id);
  		return Redirect('/admin/usuarios')->with($delete->delete())->with('alert', 'Usuario borrado');
	}

}
