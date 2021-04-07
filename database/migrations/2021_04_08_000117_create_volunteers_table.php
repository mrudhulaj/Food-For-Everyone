<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteers', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('UserID');
			$table->string('FirstName', 100);
			$table->string('LastName', 100);
			$table->string('Occupation', 100);
			$table->string('Email', 100);
			$table->string('Phone', 50);
			$table->string('Country', 200);
			$table->integer('CountryID');
			$table->string('District', 100);
			$table->integer('DistrictID');
			$table->string('State', 100);
			$table->integer('StateID');
			$table->string('FacebookLink', 500)->nullable();
			$table->string('TwitterLink', 500)->nullable();
			$table->string('ProfileImage', 300)->nullable();
			$table->integer('IsApproved')->default(0)->comment('0 - Pending | 1 - Approved | 2- Rejected');
			$table->string('CreatedUser', 100);
			$table->dateTime('CreatedDate');
			$table->string('EditedUser', 100)->nullable();
			$table->integer('CreatedUserID')->nullable();
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
		Schema::drop('volunteers');
	}

}
