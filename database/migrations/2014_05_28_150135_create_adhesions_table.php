<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdhesionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adhesions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('licence');
			$table->string('asac');
			$table->date('date');
			$table->integer('origin_label_id')->unsigned()->nullable();
			$table->boolean('magazine')->nullable();
			$table->boolean('tank')->nullable();
			$table->boolean('regulator')->nullable();
			$table->boolean('supervisor')->nullable();
			$table->boolean('lannionPool')->nullable();
			$table->boolean('freePool')->nullable();
			$table->boolean('trestelPool')->nullable();
			$table->boolean('access')->nullable();
			$table->integer('insurance_label_id')->unsigned()->nullable();
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
		Schema::drop('adhesions');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}