<?php namespace papeleria;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pedidos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'id_user', 'total', 'cantidad', 'email_user', 'email_receiver', 'details'];


}
