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
use papeleria\Http\Requests\ValidarCarritoRequest;

class NormalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){

		$this->middleware('auth');
		$count = Cart::get();
    	\View::share('count', $count);
    	
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

	public function search2(Request $request){
		
		$products = Products::name($request->get('name'))->orderBy('id', 'asc')->paginate(12);
		return view('catalogo_n')->with('products', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(ValidarCarritoRequest $request)
	{

		$user = Auth::User();     
        $id = $user->id;

		$products = new Pedidos;

		$products->user_id = $id;
		$products->status = '0';
		$cart = Cart::get();
		$products->precio_total = $cart->total();
		$products->total_products = $cart->count();
        $products->articulos = json_encode($cart->products());
        $products->email_user = 'luigidanny@hotmail.com';
        $products->details = Input::get('details');
		
		return Redirect('/desktop/pedidos')->with($products->save(),$cart->reset())->with('alert', 'Pedido Creado');
	}

	public function pedidos_normal(){

		$user = Auth::User();     
        $id = $user->id;

		$empresa = \DB::table('pedidos')
		/**/
		->where('users.id', $id)
		->select('pedidos.id as PedidoID', 'pedidos.*', 'users.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->orderby('PedidoID','DESC')
		->paginate(15);
		
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
	public function store($id){
		
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function pedido_show($id){

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
		
		return view('pedido_show')->with('pedido', $pedido)->with('productos', $productos);
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
