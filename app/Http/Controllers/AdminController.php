<?php namespace papeleria\Http\Controllers;

use papeleria\Http\Requests;
use Illuminate\Http\Request;
use papeleria\Http\Controllers\Controller;
use papeleria\Products;
use papeleria\User;
use papeleria\Credits;
use Illuminate\Contracts\Auth\Guard;
use Input;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
		/*guest sirve para cuando NO este logueado todos puedan ver las view
		y auth sirve para cuando este logueado solo los usuarios registrados puedan ver las views*/
	}

	public function desktop(Guard $auth)
	{
		if ($auth->user()->normal()) {

			return view('desktop');

		} else {

			return redirect('/admin');
		}

	}

	public function admin()
	{
		$user = user::all();
		return view('admin')->with('user', $user);
	}

/*-------------------------------------------*/

	public function usuarios(){

		$user = user::all();
		return view('usuarios')->with('user', $user);
	}

	public function creditos(){

		$credit = Credits::all();
		return view('creditos')->with('credit', $credit);
	}

	public function catalogo(){
		
		$products = products::all();
		return view('catalogo')->with('products', $products);
	}
/*---------------------------------------*/

	public function carrito()
	{
		$products = products::all();
		return view('carrito')->with('products', $products);
	}

/*---------------------------------------*/
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

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

	public function nuevo($id)
	{
		$user = user::find($id);
		return view('nuevo')->with('user', $user);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function refresh($id)
	{

		$details = new user();

		$details->name = Input::get('name');
		$details->email = Input::get('email');

		$details->save();

		return Redirect('/admin/usuarios')->with('alert', 'Usuario Modificado');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$details = user::find($id);
		return view('edit')->with('details', $details);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$products = products::find($id);
		return view('update')->with('products', $products);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$delete = user::find($id);
  		return Redirect('/admin/usuarios')->with($delete->delete())->with('alert', 'Usuario borrado');
	}

}
