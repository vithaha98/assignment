<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        foreach (range(1, 10) as $value) {
            \App\Models\Users::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('anhvit12'),
            ]);

        }
    }
}
