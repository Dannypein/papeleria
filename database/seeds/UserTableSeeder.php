<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use papeleria\User;

class UserTableSeeder extends Seeder{

	public function run(){

		user::create(
			[
				'name' => 'Daniel Dolores Cardenas',
				'email' => 'danieldolores117@gmail.com',
				'password' => Hash::make('secret')
			]
		);
	}

}