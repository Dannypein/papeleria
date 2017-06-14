<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

  const TABLE_NAME = 'categories';

  public function up() {
	  Schema::create(self::TABLE_NAME, function(Blueprint $table) {
	    $table->increments('id');
	    $table->string('name');
    });
	}

	public function down() {
	  Schema::drop(self::TABLE_NAME);
	}

}
