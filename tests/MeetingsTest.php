<?php

class MeetingsTest extends TestCase {


	public function setUp()
	{
		parent::setUp();
		
		Artisan::call('migrate');
	}


	public function tearDown()
	{
		parent::setUp();

		Artisan::call('migrate:rollback');
	}


	public function test_fetches_meetings()
	{
		App\Course::create(['name' => 'Testgolfplatz', 'email' => 'test@email.com']);

		App\Meeting::create(['course_id' => 1, 'published_for' => Carbon\Carbon::now()]);

		$meetings = App\Meeting::all();

		$this->assertCount(1, $meetings);
	}


	public function test_fetches_meetings_with_users()
	{
		App\Course::create(['name' => 'Testgolfplatz', 'email' => 'test@email.com']);

		App\User::create(['name' => 'Hans Heinrich', 'email' => 'david@doe.at']);
		App\User::create(['name' => 'John Doe', 'email' => 'john@doe.at']);

		App\Meeting::create(['course_id' => 1, 'published_for' => Carbon\Carbon::now()]);

		$meeting = App\Meeting::find(1);

		$course = App\Course::find($meeting->course_id);

		$this->assertEquals($course->name, 'Testgolfplatz');

		$meeting->users()->sync(App\User::lists('id'));

		$this->assertCount(2, $meeting->users()->getResults());
		
	}



}