<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

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
			$table->integer('country_id')->unsigned();
			$table->integer('state_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('gender_id')->unsigned();
			$table->string('name', 30);
			$table->string('email', 100);
			$table->string('password', 60);
			$table->integer('birthYear');
			$table->integer('length');
			$table->boolean('acceptedRules');
			$table->boolean('isActivated');
			$table->boolean('isPaused');
			$table->string('token', 50);
			$table->text('description');
			$table->timestamp('lastLogin');
			$table->timestamp('lastActivity');
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
