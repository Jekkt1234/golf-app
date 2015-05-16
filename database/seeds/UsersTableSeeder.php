<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		foreach(range(0,30) as $index)
		{
			App\User::create([
				'name' => $faker->name(),
				'email' => $faker->email()
			]);
		}
	}



}