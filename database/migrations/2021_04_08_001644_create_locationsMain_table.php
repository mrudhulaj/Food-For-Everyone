<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locationsMain', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('District', 200);
			$table->integer('DistrictID');
			$table->string('State', 200);
			$table->integer('StateID');
			$table->string('Country', 200);
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
		Schema::drop('locationsMain');
	}

}
