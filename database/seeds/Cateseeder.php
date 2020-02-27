<?php

use Illuminate\Database\Seeder;

class Cateseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 4) as $value) {
            \App\Models\Catogery::create([
                'name' => $faker->text('5'),
            ]);

        }
    }
}

