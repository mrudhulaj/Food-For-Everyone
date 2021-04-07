<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('FirstName');
			$table->string('LastName');
			$table->string('Email')->unique('users_email_unique');
			$table->string('TypeOfAccount', 30);
			$table->string('Password');
			$table->string('Phone', 100);
			$table->string('Occupation', 100)->nullable();
			$table->string('District', 100)->nullable();
			$table->integer('DistrictID')->nullable();
			$table->string('State', 100)->nullable();
			$table->integer('StateID')->nullable();
			$table->text('Country', 65535)->nullable();
			$table->integer('CountryID')->nullable();
			$table->string('FacebookLink', 500)->nullable();
			$table->string('TwitterLink', 500)->nullable();
			$table->string('ProfileImage', 300)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
