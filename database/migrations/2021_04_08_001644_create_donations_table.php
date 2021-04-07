<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donations', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Firstname', 100);
			$table->string('Lastname', 100)->default('');
			$table->string('Amount', 50);
			$table->integer('CauseID')->nullable();
			$table->string('Phone', 20);
			$table->string('Email', 100);
			$table->string('CreatedUser', 100);
			$table->integer('CreatedUserID')->nullable();
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
		Schema::drop('donations');
	}

}
