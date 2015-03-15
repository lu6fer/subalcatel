<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boatLabels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('level');
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
		Schema::drop('boatLabels');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}