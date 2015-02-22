<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('cars', function(Blueprint $table)
            {
                $table->increments('car_id');
                $table->string('car_mark', 50);
                $table->string('car_model', 50);
                $table->integer('car_km');
                $table->integer('user_id');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('cars');
	}

}
