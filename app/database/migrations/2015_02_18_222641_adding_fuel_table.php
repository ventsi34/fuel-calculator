<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingFuelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('fuel', function(Blueprint $table)
            {
                $table->increments('fuel_id');
                $table->float('quantity');
                $table->integer('trip');
                $table->integer('trip_type_id');
                $table->integer('fuel_station_id');
                $table->integer('car_id');
                $table->timestamps();
                $table->softDeletes();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('fuel');
	}

}
