<?php

use papeleria\products;

if ( ! function_exists('add_to_cart_button')) {
  function add_to_cart_button(products $product) {
    $id    = $product->id;
    $sku   = $product->sku;
    $name  = $product->name;
    $price = $product->price;
    $token = csrf_token();

    return <<<HTML
<div class="btn-add-cart-wrapper">
  <button class="btn btn-primary btn-add-cart btn-block">
    <i class="fa fa-shopping-cart"></i> Añadir al carrito
  </button>
  <form class="count-input" hidden>
    <input type="hidden" name="product[id]" value="{$id}">
    <input type="hidden" name="product[sku]" value="{$sku}">
    <input type="hidden" name="product[nombre]" value="{$name}">
    <input type="hidden" name="product[precio_unitario]" value="{$price}">
    <input type="hidden" name="_token" value="{$token}">
    <div class="input-group">
      <div class="input-group-addon">
        <label>Cantidad</label>
      </div>
      <input type="number" step="1" value="1" min="1" max="500" name="product[cantidad]" class="form-control">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-success">Añadir</button>
      </div>
    </div>
  </form>  
  <div class="text-center spinner" hidden>
    <div class="fa fa-spinner fa-spin"></div>
  </div>
</div>
HTML;

  }
}
