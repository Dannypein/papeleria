<?php namespace papeleria\Http\Controllers;

use Illuminate\Http\Response;
use papeleria\Cart;
use papeleria\Http\Requests\AddProductToCartRequest;

class CartController extends Controller {

  /**
   * Muestra el carrito de compra de un usuario.
   *
   * @param Cart $cart
   *
   * @return Response
   */
	public function show(Cart $cart) {
    $products = $cart->products();

    return view('carrito', compact('products'));
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
