<?php namespace papeleria;

use Illuminate\Database\Eloquent\Model;

class products extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'name', 'sku', 'price', 'available', 'model', 'brand', 'size', 'weight', 'type', 'unit', 'details'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

  public static function createFromCSV($row)
  {
    $data = [
      'sku'       => data_get($row, 'clave'),
      'name'      => array_get($row, 'descripcion'),
      'brand'     => array_get($row, 'linea'),
      'model'     => array_get($row, 'modelo'),
      'size'      => array_get($row, 'talla'),
      'available' => array_get($row, 'existencias'),
    ];

    return $data;
  }

}
