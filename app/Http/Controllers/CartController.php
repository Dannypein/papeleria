<?php namespace papeleria\Http\Controllers;

use Illuminate\Http\Response;
use papeleria\Cart;
use papeleria\Http\Requests\AddProductToCartRequest;

class CartController extends Controller {

  public function __construct(){

    $count = Cart::get();
      \View::share('count', $count);

    /*guest sirve para cuando NO este logueado todos puedan ver las view
    y auth sirve para cuando este logueado solo los usuarios registrados puedan ver las views*/
  }

  /**
   * Muestra el carrito de compra de un usuario.
   *
   * @param Cart $cart
   *
   * @return Response
   */
	public function show(Cart $cart) {

    $products = $cart->products();
    return view('carrito', compact('products'), ['cart' => $cart]);
  }

  /**
   * Añade un producto al cart del usuario actual.
   *
   * @param AddProductToCartRequest $request
   * @param Cart                    $cart
   *
   * @return Response
   */
  public function addProduct(AddProductToCartRequest $request, Cart $cart) {
	  $product = $request->get('product');
	  $product['subtotal'] = $product['cantidad'] * $product['precio_unitario'];

	  $cart->addProduct($product);

    return response()->json(['product'        => $product,
                             'total_products' => $cart->count(),
                             'token'          => csrf_token()]);
  }

  public function removeProduct($id, Cart $cart) {
    $cart->removeProduct($id);

    return redirect()->back()->with('success', 'Producto removido del carrito.');
  }

  /**
   * Vacía el carrito de compra del usuario actual.
   *
   * @param Cart $cart
   *
   * @return Response
   */
  public function destroy(Cart $cart) {

    $cart->reset();
    return redirect()->back()->with('success', 'Carrito vaciado.');

  }

}
