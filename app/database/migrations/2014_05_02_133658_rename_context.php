<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameContext extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('textannotations', function(Blueprint $table)
		{
			$table->renameColumn('context', 'content');
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
			$table->renameColumn('content', 'context');
		});
	}

}
