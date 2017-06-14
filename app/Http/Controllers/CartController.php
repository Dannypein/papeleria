<?php namespace papeleria\Http\Controllers;

use papeleria\Http\Requests;
use papeleria\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

		$cart = session('carrito',[]);

		$articulo =['id'=>1,
					'cantidad'=>5,
					'precio_unitario'=>10,
					'subtotal'=>50];

		$cart[] =$articulo;
		session()->put('cart',$cart);

		return Redirect('/carrito')->with('carrito', $cart);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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