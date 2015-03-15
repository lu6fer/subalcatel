<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatLicencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boatLicences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('boat_label_id')->unsigned()->nullable();
			$table->string('licence');
			$table->string('instructor')->nullable();
			$table->string('origine')->nullable();
			$table->string('noOrigine')->nullable();
			$table->date('date')->nullable();
			$table->boolean('vhfLicence')->nullable();
			$table->string('vhfNoLicence')->nullable();
			$table->date('vhfDate')->nullable();
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
		Schema::drop('boatLicences');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

