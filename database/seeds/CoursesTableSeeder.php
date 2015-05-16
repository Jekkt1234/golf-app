<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CoursesTableSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		foreach(range(0,20) as $index)
		{
			App\Course::create([
				'name' => $faker->company(),
				'phone' => $faker->phoneNumber(),
				'email' => $faker->email()
			]);
		}
	}



}