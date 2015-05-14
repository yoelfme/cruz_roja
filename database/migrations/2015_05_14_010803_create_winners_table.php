<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('winners', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('id_ticket')->unsigned();
			$table->foreign('id_ticket')->references('id')->on('tickets');

			$table->integer('id_prize')->unsigned();
			$table->foreign('id_prize')->references('id')->on('prizes');

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
		Schema::drop('winners');
	}

}
