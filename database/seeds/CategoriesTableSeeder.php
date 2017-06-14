<?php

use Illuminate\Database\Seeder;
use papeleria\Category;

class CategoriesTableSeeder extends Seeder{

	public function run(){
    Category::create(['name' => 'Papelería y oficina']);
    Category::create(['name' => 'Consumibles originales']);
    Category::create(['name' => 'Consumibles genéricos']);
    Category::create(['name' => 'Accesorios o equipo de cómputo']);
	}

}
