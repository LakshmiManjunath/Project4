<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function($table) {

		$table->increments('id');
		$table->integer('user_id')->unsigned();
		$table->foreign('user_id')->references('id')->on('users'); 
		$table->date('entry_date');
		$table->text('personal_entry');
		$table->text('professional_entry');
		$table->text('fitness_entry');
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
		Schema::drop('entries');
	}

}
