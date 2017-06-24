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
  protected $fillable = ['*'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  public static function createFromCSV($row) {
    $data = [
      'sku'         => data_get($row, 'clave'),
      'name'        => array_get($row, 'descripcion'),
      'model'       => array_get($row, 'modelo'),
      'size'        => array_get($row, 'talla'),
      'stock'   => array_get($row, 'existencias'),
      'category' => array_get($row, 'linea'),
      'available' => array_get($row, 'disponible'),
    ];

    return $data;
  }

  public function category() {
    return $this->belongsTo('papeleria/Category');
  }

  public function scopeName($query, $name) {

    if (trim($name)!= "") {

      $query->where(\DB::raw("CONCAT(name,'', sku)"), "LIKE", "%$name%");
    }
  }
    

  public function getPriceAttribute() {
    $price = $this->attributes['price'] or $price = 0.0;

    return number_format($price, 2);
  }

}
