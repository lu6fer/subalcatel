<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::table('dives', function($table){
			$table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::table('diveLevels', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('dive_label_id')->references('id')->on('diveLabels');
		});
		Schema::table('nitroxLevels', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('nitrox_label_id')->references('id')->on('nitroxLabels');
		});
		Schema::table('monitorLevels', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('monitor_label_id')->references('id')->on('monitorLabels');
		});
		Schema::table('boatLicences', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('boat_label_id')->references('id')->on('boatLabels');
		});
		Schema::table('tivLicences', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::table('adhesions', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('origin_label_id')->references('id')->on('originLabels');
			$table->foreign('insurance_label_id')->references('id')->on('insuranceLabels');
		});
		Schema::table('certificate', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::table('articles', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
		Schema::table('comments', function($table) {
			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users');
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
		//Schema::drop('foreign_keys');
	}

}
