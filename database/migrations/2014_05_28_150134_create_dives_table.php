<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dives', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
            $table->string('slug');
			$table->mediumtext('description');
			$table->string('place');
			$table->boolean('active')->default(1);
			$table->integer('owner')->unsigned()->nullable();
			$table->timestamp('date');
			$table->timestamp('ending');
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
		Schema::drop('dives');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
