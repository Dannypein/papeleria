<?php namespace papeleria;

use Illuminate\Database\Eloquent\Model;

class TblaCreditos extends Model {

	protected $table = 'tbla_creditos';

	 protected $fillable = [
        'id','name','email',
        'id_credit', 'id_department'];

    public function userdat(){
    	return $this->belongsToMany('App\User');
    }

    public function credit(){
    	return $this->belongsToMany('App\Credits');
    }

    public function depart(){
    	return $this->belongsToMany('App\Departmets');
    }

}
