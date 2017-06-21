<?php namespace papeleria\Http\Middleware;

use papeleria\Cart;

class CheckIfCanAffordProduct {

  public function handle($request, $next) {
    $user               = \Auth::user();
    $pedidos_pendientes = $user->pedidos()->pendientes()->get();

    $new_product = $request->get('product');
    $value = $new_product['precio_unitario'] * $new_product['cantidad'];

    $total = $pedidos_pendientes->sum('precio_total') + Cart::get()->total() + $value;
    if ($total <= $user->credit_limit) {
      return $next($request);
    } else {
      return response()->json(['credit_limit' => number_format($user->credit_limit, 2),
                               'difference'   => number_format($total - $user->credit_limit, 2)], 422);
    }
  }

}
