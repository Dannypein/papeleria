<?php namespace papeleria\Http\Requests;

class AddProductToCartRequest extends Request {

	/**
   * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
		'product.id'              => 'required|numeric',
      	'product.nombre'          => 'required',
      	'product.cantidad'        => 'required|numeric',
      	'product.precio_unitario' => 'required|numeric',
		];
	}

}
