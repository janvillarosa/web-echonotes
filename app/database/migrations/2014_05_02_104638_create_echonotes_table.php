<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEchonotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('echonotes', function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('url');
			$table->unsignedInteger('duration');
			$table->unsignedInteger('users_id');
			$table->timestamps();
			$table->engine = 'MyISAM';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('echonotes');
	}

}
