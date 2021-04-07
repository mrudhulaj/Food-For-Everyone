<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locationsCountry', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Country', 500);
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
		Schema::drop('locationsCountry');
	}

}
