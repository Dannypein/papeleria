<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CamposNulosEnProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->string('name')->nullable()->change();
			$table->string('sku')->nullable()->change();
			$table->float('price')->nullable()->change();
			$table->string('available')->nullable()->change();
			$table->string('model')->nullable()->change();
			$table->string('brand')->nullable()->change();
			$table->string('size')->nullable()->change();
			$table->string('weight')->nullable()->change();
			$table->string('type')->nullable()->change();
			$table->string('unit')->nullable()->change();
			$table->mediumText('details')->nullable()->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('products', function(Blueprint $table) {
      $table->string('name')->change();
      $table->string('sku')->change();
      $table->float('price')->change();
      $table->string('available')->change();
      $table->string('model')->change();
      $table->string('brand')->change();
      $table->string('size')->change();
      $table->string('weight')->change();
      $table->string('type')->change();
      $table->string('unit')->change();
      $table->mediumText('details')->change();
    });
	}

}
