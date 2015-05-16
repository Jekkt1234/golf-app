<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CourseUserTableSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();


		$courseIds = App\Course::lists('id');
		$userIds = App\User::lists('id');


		foreach(range(0,20) as $index)
		{
			DB::table('course_user')->insert([
				'course_id' => $faker->randomElement($courseIds),
				'user_id' => $faker->randomElement($userIds)
			]);
		}
	}



}