<?php namespace papeleria;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $id
 * @property string     $name
 * @property Collection $products
 */
class Category extends Model {

  public function products() {
    return $this->hasMany(products::class);
  }

}
