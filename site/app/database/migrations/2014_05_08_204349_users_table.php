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
			$table->integer('birth_year');
			$table->integer('length');
			$table->boolean('accepted_rules');
			$table->boolean('is_activated');
			$table->boolean('is_paused');
			$table->string('token', 50);
			$table->text('description');
			$table->timestamp('last_login_at');
			$table->timestamp('last_activity_at');
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
