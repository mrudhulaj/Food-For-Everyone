<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCausesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('causes', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('CauseName', 100);
			$table->text('CauseLongDescription', 65535);
			$table->text('CauseShortDescription', 65535);
			$table->integer('ExpectedAmount');
			$table->integer('RaisedAmount')->default(0);
			$table->string('Email', 50);
			$table->string('Phone', 50);
			$table->string('Landmark', 200);
			$table->string('Country', 200);
			$table->integer('CountryID');
			$table->string('District', 50);
			$table->integer('DistrictID');
			$table->string('State', 50);
			$table->integer('StateID');
			$table->string('City', 50);
			$table->text('Image', 65535)->nullable();
			$table->integer('IsApproved')->default(0)->comment('0 - Pending | 1 - Approved | 2- Rejected');
			$table->dateTime('CreatedDate');
			$table->string('CreatedUser', 50);
			$table->timestamp('EditedDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('EditedUser', 50)->nullable();
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
		Schema::drop('causes');
	}

}
