<?php

class CoursesTest extends TestCase {


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

	public function test_fetches_courses()
	{
		App\Course::create(['name' => 'Testgolfplatz', 'email' => 'test@email.com']);

		$courses = App\Course::all();

		$this->assertCount(1, $courses);

		return $courses;
	}


	public function test_fetches_users()
	{
		App\User::create(['name' => 'John Doe', 'email' => 'john@doe.at']);

		$user = App\User::all();

		$this->assertCount(1, $user);

		return $user;
	}

	/**
	 *	@depends test_fetches_users
	 *	@depends test_fetches_courses
	 */

	public function test_fetch_courses_users($user, $courses)
	{
		App\User::create(['name' => 'John Doe', 'email' => 'john@doe.at']);
		App\Course::create(['name' => 'Testgolfplatz', 'email' => 'test@email.com']);

		$first_user_id = $user->first()->id;
		$first_course_id = $courses->first()->id;

		# $user->first()->courses()->attach($first_course_id);
		$courses->first()->users()->attach($first_user_id);

	}

}