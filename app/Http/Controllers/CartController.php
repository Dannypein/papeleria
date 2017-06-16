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
    return $cart->products();
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

	  $cart->addProduct($product);

    return response()->json(['product' => $product, 'total_products' => $cart->count()]);
  }

}
