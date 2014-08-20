<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tags')->insert(array('id' => 'Home'));
		DB::table('tags')->insert(array('id'=>'School'));
		DB::table('tags')->insert(array('id'=>'Work'));
		DB::table('tags')->insert(array('id'=>'Personal'));
		DB::table('tags')->insert(array('id'=>'Business'));
		DB::table('tags')->insert(array('id'=>'Miscellaneous'));
		DB::table('tags')->insert(array('id'=>'Shared'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('tags')->truncate();
	}

}
