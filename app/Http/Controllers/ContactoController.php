<?php namespace papeleria\Http\Controllers;

use papeleria\Http\Requests;
use papeleria\Http\Controllers\Controller;
use Illuminate\Http\Request;
use papeleria\Cart;
use papeleria\Pedidos;

class ContactoController extends Controller {

	public function __construct(){

		$count = Cart::get();
    	\View::share('count', $count);

		/*guest sirve para cuando NO este logueado todos puedan ver las view
		y auth sirve para cuando este logueado solo los usuarios registrados puedan ver las views*/
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $peticion)
	{
	    $datos = $peticion->except('_token');

	    \Mail::send('emails.contacto', $datos, function($mail) {
	      $mail->to('luigidanny@hotmail.com');
	      $mail->subject('Contacto desde Ofimedia Papeleria');
	      $mail->from('ofimedia_mzo_cntacto@outlook.com');
	    });

	    return view('contacto', ['enviado' => true]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function remit($id){

		$pedido = \DB::table('pedidos')
		/**/
		->where('pedidos.id', $id)
		->select('pedidos.id as PedidoID', 'pedidos.created_at as Pcreate', 'pedidos.*', 'users.*', 'company.*', 'departments.*')
		->join('users', 'users.id', '=', 'pedidos.user_id')
		->join('company', 'company.id', '=', 'users.company_id')
		->join('departments', 'departments.id', '=', 'users.department_id')
		->get();
		
		$pedido3 = pedidos::find($id);
		$products = json_decode($pedido3->articulos);
		$datos = [
		  'products' => $products,
		  'pedido' => $pedido,
		];

	    \Mail::send('emails.remit', $datos, function($mail) {
	      $mail->to('luigidanny@hotmail.com');
	      $mail->subject('Pedido de Ofimedia Papeleria');
	      $mail->from('ofimedia_mzo_cntacto@outlook.com');
	    });

	    return Redirect('/desktop/pedidos')->with('alert', 'Pedido Enviado');
	}

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
		//
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
