<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiveUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dive_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dive_id')->unsigned()->index();
			$table->foreign('dive_id')->references('id')->on('dives')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('comment');
			$table->boolean('drink')->default(false);
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
		Schema::drop('dive_user');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
