<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactUsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactUs', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('FirstName', 100);
			$table->string('LastName', 100);
			$table->string('Email', 100);
			$table->string('Phone', 100);
			$table->text('Subject', 65535);
			$table->text('Message', 65535);
			$table->integer('RaisedTicket')->default(0)->comment('0 - Not a raised ticket | 1 - Raised Ticket');
			$table->integer('TicketStatus')->nullable()->default(0)->comment('0 - Pending | 1 - Review | 2- Resolved');
			$table->string('CreatedUser', 100)->default('Guest');
			$table->timestamp('CreatedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('EditedUser', 100)->nullable()->default('Guest');
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
		Schema::drop('contactUs');
	}

}
