<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		App\Course::truncate();
		App\User::truncate();

		Model::unguard();

		$this->call('CoursesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CourseUserTableSeeder');
	}

}
