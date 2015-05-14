<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('id_raffle')->unsigned();
			$table->foreign('id_raffle')->references('id')->on('raffles');

			$table->integer('id_seller')->unsigned();
			$table->foreign('id_seller')->references('id')->on('sellers');

			$table->integer('id_user')->unsigned();
			$table->foreign('id_user')->references('id')->on('users');

			$table->integer('quantity');
			$table->integer('start');
			$table->integer('end');
			$table->decimal('price', 18, 2);
			$table->enum('state', ['full_sold', 'sold', 'unsold', 'not_for_sale']);

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
		Schema::drop('books');
	}

}
