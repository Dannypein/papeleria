<?php namespace papeleria\Http\Requests;

class ValidarCarritoRequest extends Request {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'details' => 'required',
    ];
  }

  public function messages()
 {
 return [
 'details.required' => 'No hay ningun comentario en detalles del pedido',
 ];
 }

}