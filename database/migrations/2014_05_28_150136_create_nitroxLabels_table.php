<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNitroxLabelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nitroxLabels', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('slug');
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
		Schema::drop('nitroxLabels');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}