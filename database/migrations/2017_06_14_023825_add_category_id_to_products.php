<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToProducts extends Migration {

  public function up() {
    DB::transaction(function() {
      Schema::table('products', function(Blueprint $table) {
        if ( ! Schema::hasColumn('products', 'category_id')) {
          $table->integer('category_id')->unsigned()->nullable();
        }

        $table->index('category_id');
        $table->foreign('category_id')->references('id')->on('categories');
      });
    });
  }

  public function down() {
    DB::transaction(function() {
      Schema::table('products', function(Blueprint $table) {
        $table->dropColumn('category_id');
        $table->dropForeign('category_id');
        $table->dropIndex(['category_id']);
      });
    });
  }

}
