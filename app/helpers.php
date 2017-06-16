<?php

use papeleria\products;

if ( ! function_exists('add_to_cart_button')) {
  function add_to_cart_button(products $product) {
    $id    = $product->id;
    $name  = $product->name;
    $price = $product->price;
    $token = csrf_token();

    return <<<HTML
<div>
  <button class="btn btn-danger btn-cart btn-lg" 
          data-product-id="{$id}" 
          data-product-name="{$name}"
          data-product-price="{$price}"
          data-csrf-token="{$token}">
    <i class="fa fa-shopping-cart"></i> Añadir al carrito
  </button>
</div>
HTML;

  }
}
