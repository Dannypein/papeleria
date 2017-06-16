<?php namespace papeleria;

use Session;

class Cart {

  public function products() {
    return Session::get('cart', []);
  }

  public function addProduct($product) {
    $cart   = Session::get('cart', []);
    $cart[] = $product;
    Session::put('cart', $cart);
  }

  public function count() {
    return count( Session::get('cart', []) );
  }

  public function isEmpty() {
    return $this->count() <= 0;
  }

  public function reset() {
    return Session::forget('cart');
  }

}
