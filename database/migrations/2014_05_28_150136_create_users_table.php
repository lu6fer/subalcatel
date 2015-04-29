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
			$table->string('name');
			$table->string('firstname');
            $table->string('slug')->nullable();
			$table->string('email')->unique();
			$table->string('phone');
			$table->string('proPhone')->nullable();
			$table->string('mobPhone')->nullable();
			$table->date('birthday');
			$table->string('birthcity');
			$table->string('birthzip');
			$table->string('password');
			$table->string('remember_token');
            $table->boolean('active')->default(1);
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
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::drop('users');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}