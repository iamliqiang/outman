<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//creat users table
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('email', 64);
		    $table->string('username', 64);
		    $table->string('password',64);
		    $table->boolean('state');
		    $table->timestamps();
		// build table indexs
		    $table->unique('email');
		    $table->index('username');
		});


	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop table users
		Schema::drop('users');
	}

}