<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locationsState', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('State', 500)->nullable();
			$table->integer('CountryID');
			$table->dateTime('CreatedDate');
			$table->string('CreatedUser', 200);
			$table->dateTime('EditedDate');
			$table->string('EditedUser', 200);
			$table->integer('CreatedUserID');
			$table->integer('EditedUserID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locationsState');
	}

}
