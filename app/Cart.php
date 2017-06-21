<?php namespace papeleria;

use Session;

class Cart {

  public static function get() {
    return new static;
  }

  public function products() {
    return Session::get('cart', []);
  }

  public function getProduct($id) {
    foreach ($this->products() as $product) {
      if ($product['id'] == $id) return $product;
    }
  }

  public function hasProduct($id) {
    return $this->getProduct($id) != null;
  }

  public function addProduct($product) {
    $cart = Session::get('cart', []);

    $already_stored_product = $this->getProduct($product['id']);
    if ($already_stored_product) {
      $index = array_search($already_stored_product, $cart);
      $already_stored_product['cantidad'] += $product['cantidad'];
      $already_stored_product['subtotal'] += $product['subtotal'];
      $cart[$index] = $already_stored_product;
    } else {
      $cart[] = $product;
    }

    Session::put('cart', $cart);
  }

  public function count() {
    return count( Session::get('cart', []) );
  }

  public function total() {
    return collect($this->products())->sum('subtotal');
  }

  public function isEmpty() {
    return $this->count() <= 0;
  }

  public function reset() {
    return Session::forget('cart');
  }

  public function removeProduct($id) {
    $cart = array_filter(Session::get('cart', []), function($product) use ($id) { return $product['id'] != $id; });
    Session::put('cart', $cart);
  }

}
