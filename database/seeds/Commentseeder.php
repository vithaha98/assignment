<?php

use Illuminate\Database\Seeder;

class Commentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 50) as $value) {
            \App\Models\Comment::create([
                'content' => $faker->text('200'),
                'post_id'=> \App\Models\Posts::inRandomOrder()->first()->id,
                'user_id'=> \App\Models\Users::inRandomOrder()->first()->id


            ]);

        }
    }
}
