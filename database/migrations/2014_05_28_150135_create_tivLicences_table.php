<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTivLicencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tivLicences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('licence');
			$table->date('date');
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
		Schema::drop('tivLicences');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}