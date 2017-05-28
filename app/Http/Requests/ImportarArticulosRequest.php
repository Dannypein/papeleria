<?php namespace papeleria\Http\Requests;

class ImportarArticulosRequest extends Request {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'archivo' => 'required',
    ];
  }

}
