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

}
