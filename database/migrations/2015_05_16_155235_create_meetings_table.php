<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetings', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('course_id')->unsigned()->index();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

			$table->timestamp('scheduled_for');
			$table->timestamps();
		});

		Schema::create('meeting_user', function(Blueprint $table)
		{
			$table->integer('meeting_id')->unsigned()->index();
			$table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');

			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('meeting_user');
		Schema::drop('meetings');
	}

}
