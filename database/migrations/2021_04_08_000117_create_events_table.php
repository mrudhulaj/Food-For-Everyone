<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('EventName', 100);
			$table->text('EventShortDescription', 65535);
			$table->text('EventLongDescription', 65535);
			$table->time('BeginTime');
			$table->time('EndTime');
			$table->string('Email', 100);
			$table->string('Phone', 100);
			$table->string('Landmark', 200);
			$table->string('Country', 200);
			$table->integer('CountryID');
			$table->string('District', 100);
			$table->integer('DistrictID');
			$table->string('State', 100);
			$table->integer('StateID');
			$table->string('City', 100);
			$table->string('EventImage', 300)->nullable();
			$table->integer('IsApproved')->default(0)->comment('0 - Pending | 1 - Approved | 2- Rejected');
			$table->dateTime('CreatedDate');
			$table->string('CreatedUser', 100);
			$table->timestamp('EditedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('EditedUser', 65535)->nullable();
			$table->integer('CreatedUserID')->nullable();
			$table->integer('EditedUserID')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
