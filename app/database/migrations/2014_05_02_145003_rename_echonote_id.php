<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameEchonoteId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('textannotations', function(Blueprint $table)
		{
			$table->renameColumn('echonotes_id','echonote_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('textannotations', function(Blueprint $table)
		{
			$table->renameColumn('echonote_id','echonotes_id');
		});
	}

}
