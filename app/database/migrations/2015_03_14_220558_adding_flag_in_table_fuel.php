<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingFlagInTableFuel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fuel', function(Blueprint $table)
		{
                    $table->boolean('is_created')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fuel', function(Blueprint $table)
		{
                    $table->dropColumn('is_created');
		});
	}

}
