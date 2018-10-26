<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('package', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('feature_image', 191)->nullable();
			$table->string('title', 191)->nullable();
			$table->integer('category_id')->unsigned()->nullable()->index('category_id');
			$table->text('description', 65535)->nullable();
			$table->integer('price_id')->unsigned()->nullable()->index('price_id');
			$table->string('discount', 191)->nullable();
			$table->string('covering_sight', 191)->nullable();
			$table->integer('day')->unsigned()->nullable();
			$table->integer('night')->unsigned()->nullable();
			$table->integer('accomodation_id')->unsigned()->nullable()->index('accomodation_id');
			$table->dateTime('traveling_date')->nullable();
			$table->text('important_notes', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('package');
	}

}
