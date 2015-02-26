<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFuelColumnName extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('fuel', function(Blueprint $table)
            {
                $table->renameColumn('fuel station_id', 'fuel_station_id');
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
                $table->renameColumn('fuel_station_id', 'fuel station_id');
            });
	}

}
