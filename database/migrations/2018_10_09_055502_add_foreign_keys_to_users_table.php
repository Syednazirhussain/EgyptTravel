<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('user_role_code', 'users_ibfk_3')->references('code')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_code', 'users_ibfk_4')->references('status_code')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_ibfk_3');
			$table->dropForeign('users_ibfk_4');
		});
	}

}
