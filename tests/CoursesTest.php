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

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_fetsches_courses()
	{
		App\Course::create(['name' => 'Testgolfplatz', 'email' => 'test@email.com']);

		$courses = App\Course::all();

		$this->assertCount(1, $courses);
	}

}