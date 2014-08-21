<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagEchonoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('echonote_tag', function($table){
			$table->increments('id');
			$table->string('tag_id');
			$table->unsignedInteger('echonote_id');
			$table->softDeletes();
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
		Schema::dropIfExists('echonote_tag');
	}

}
