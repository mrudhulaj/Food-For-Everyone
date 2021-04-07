<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRaisedTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raisedTickets', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('ContactUsID');
			$table->string('Category', 100)->comment('Cause/Events/AvailableFood/Volunteer');
			$table->integer('CategoryID')->comment('ID of the category');
			$table->integer('TicketStatus')->default(0)->comment('0 - Pending | 1 - Review | 2- Resolved');
			$table->text('Subject', 65535);
			$table->text('Message', 65535);
			$table->integer('Severity')->comment('0 - Low | 1 - Medium | 2- High');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('raisedTickets');
	}

}
