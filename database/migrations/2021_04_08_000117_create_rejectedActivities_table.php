<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRejectedActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rejectedActivities', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Activity', 200);
			$table->integer('ActivityID');
			$table->text('Reason', 65535)->nullable();
			$table->string('ActivityCreatedBy', 200);
			$table->integer('ActivityCreatedByID');
			$table->timestamp('CreatedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rejectedActivities');
	}

}
