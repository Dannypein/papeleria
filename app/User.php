<?php namespace papeleria;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'type', 'department_id', 'company_id', 'credit_limit'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Determina si este usuario es un superadmin.
	 *
	 * @return boolean
	 */
	public function admin() {
		return $this->type === 'admin';
	}

	/**
	 * Determina si este usuario es un usuario normal.
	 *
	 * @return boolean
	 */
	public function normal() {
		return $this->type === 'normal';
	}

	public function pedidos() {
	  return $this->hasMany('papeleria/Pedidos', 'user_id');
  }
}
