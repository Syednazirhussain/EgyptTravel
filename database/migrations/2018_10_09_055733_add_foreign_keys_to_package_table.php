<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPackageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('package', function(Blueprint $table)
		{
			$table->foreign('price_id', 'package_ibfk_1')->references('id')->on('price')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('category_id', 'package_ibfk_2')->references('id')->on('category')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('accomodation_id', 'package_ibfk_3')->references('id')->on('acommodation')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('package', function(Blueprint $table)
		{
			$table->dropForeign('package_ibfk_1');
			$table->dropForeign('package_ibfk_2');
			$table->dropForeign('package_ibfk_3');
		});
	}

}
