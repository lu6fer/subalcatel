<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNitroxLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nitroxLevels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('nitrox_label_id')->unsigned()->nullable();
			$table->string('licence');
			$table->string('instructor');
			$table->string('origine');
			$table->string('noOrigine');
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
		Schema::drop('nitroxLevels');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
