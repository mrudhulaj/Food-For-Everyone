<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvailableFoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('availableFoods', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('FirstName', 100);
			$table->string('LastName', 100);
			$table->string('TypeOfDonation', 30);
			$table->string('VegNonVeg', 50);
			$table->string('RestaurantName', 100)->nullable();
			$table->string('Email', 100);
			$table->string('Phone', 100);
			$table->string('Country', 200);
			$table->integer('CountryID');
			$table->string('District', 50);
			$table->integer('DistrictID');
			$table->string('State', 50);
			$table->integer('StateID');
			$table->string('City', 100);
			$table->integer('FoodCount');
			$table->dateTime('ExpiryTime');
			$table->string('CreatedUser', 100)->nullable();
			$table->integer('CreatedUserID')->nullable();
			$table->timestamp('CreatedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('EditedUser', 100)->nullable();
			$table->integer('EditedUserID')->nullable();
			$table->timestamp('EditedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('availableFoods');
	}

}
